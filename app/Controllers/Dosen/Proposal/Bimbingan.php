<?php

namespace App\Controllers\Dosen\Proposal;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Bimbingan extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data = [
            'title' => 'Data Mahasiswa Bimbingan',
            'db' => $this->db,
            'data_mhs_bimbingan' => $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit` FROM tb_pengajuan_pembimbing a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` WHERE nip='$id' AND status_pengajuan='diterima'")->getResult(),
        ];
        return view('Dosen/Proposal/data_bimbingan', $data);
    }
    public function bimbingan_proposal_dosen($nim)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = $nim;
        $id_bimbingan_terbaru_mhs = $this->db->query("SELECT * FROM tb_bimbingan WHERE `from` = '$nim' AND `to` = '" . session()->get('ses_id') . "' ORDER BY create_at DESC LIMIT 1")->getResult()[0]->id_bimbingan;
        $data = [
            'title' => 'Bimbingan Proposal',
            'db' => $this->db,
            'nim' => $id,
            'id_bimbingan_terbaru_mhs' => $id_bimbingan_terbaru_mhs,
            'pemberitahuan' => $this->db->query("SELECT a.*,b.`nama` AS nama_mhs FROM tb_bimbingan a LEFT JOIN tb_mahasiswa b ON a.`from`=b.`nim` WHERE a.`to` = '" . session()->get('ses_id') . "' AND a.`from`='" . $id . "' AND a.status_baca='belum dibaca'")->getResult(),
            'dosen_pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima'")->getResult(),
            'progress_bimbingan' => $this->db->query("SELECT * FROM tb_bimbingan WHERE (`from` = '" . $id . "' OR `to` = '" . $id . "') AND (`from` = '" . session()->get('ses_id') . "' OR `to` = '" . session()->get('ses_id') . "')")->getResult(),

        ];
        return view('Dosen/Proposal/bimbingan_proposal', $data);
    }
    public function tambah()
    {

        $nim = $this->request->getPost('nim');
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        if (!$this->validate([
            'pokok_bimbingan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pokok bimbingan tidak boleh kosong'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM harus terisi.'
                ]
            ]
        ])) {
            session()->setFlashdata('message_bimbingan', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> ' . $this->validator->listErrors() . '</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->to("/bimbingan_proposal_dosen/$nim");
        }
        $pokok_bimbingan = $this->request->getPost('pokok_bimbingan');
        $keterangan = $this->request->getPost('keterangan');
        $berkas = $this->request->getFile('berkas');
        $name = $berkas->getRandomName();
        if ($berkas->getName() != '') {
            if ($berkas->move(WRITEPATH . '../public/berkas/', $name)) {
                $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,berkas,pokok_bimbingan,create_at,parent_id_bimbingan) VALUES('" . session()->get('ses_id') . "','$nim','belum dibaca','$keterangan','$name','$pokok_bimbingan',now(),'$id_bimbingan')");
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim revisi.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
                $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Revisi bimbingan $id_bimbingan',now())");
            } else {
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> kirim revisi.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            }
        } else {
            $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,pokok_bimbingan,create_at,parent_id_bimbingan) VALUES('" . session()->get('ses_id') . "','$nim','belum dibaca','$keterangan','$pokok_bimbingan',now(),'$id_bimbingan')");
            session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Revisi bimbingan $id_bimbingan',now())");
        }
        return redirect()->to("/bimbingan_proposal_dosen/$nim");
    }
    public function hapus()
    {
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        $nim = $this->request->getPost('nim');
        $this->db->query("DELETE FROM tb_bimbingan WHERE id_bimbingan='$id_bimbingan'");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dihapus','id bimbingan $id_bimbingan dihapus ',now())");
        session()->setFlashdata("message_bimbingan", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> menghapus bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
        return redirect()->to("/bimbingan_proposal_dosen/$nim");
    }
}
