<?php

namespace App\Controllers\Mahasiswa\Proposal;

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
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data = [
            'title' => 'Bimbingan Proposal',
            'pemberitahuan' => $this->db->query("SELECT * FROM tb_bimbingan WHERE (`to` = '" . $id . "') AND status_baca='belum dibaca'")->getResult(),
            'dosen_pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima'")->getResult(),
            'progress_bimbingan' => $this->db->query("SELECT * FROM tb_bimbingan WHERE (`from` = '" . $id . "' OR `to` = '" . $id . "')")->getResult(),

        ];
        return view('Mahasiswa/Proposal/bimbingan_proposal', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'pokok_bimbingan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pokok bimbingan tidak boleh kosong'
                ]
            ],
            'pembimbing' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih pembimbing'
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
            return redirect()->to('/bimbingan_proposal');
        }
        $pokok_bimbingan = $this->request->getPost('pokok_bimbingan');
        $keterangan = $this->request->getPost('keterangan');
        $berkas = $this->request->getFile('berkas');
        $pembimbing = $this->request->getPost('pembimbing');
        echo $pembimbing;
        echo $pokok_bimbingan;
        echo $keterangan;
        echo $berkas->getName();
        $name = $berkas->getRandomName();
        if ($berkas->getName() != '') {
            if ($berkas->move(WRITEPATH . '../public/berkas/', $name)) {
                $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,berkas,pokok_bimbingan,create_at) VALUES('" . session()->get('ses_id') . "','$pembimbing','belum dibaca','$keterangan','$name','$pokok_bimbingan',now())");
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
                $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Bimbingan kepada pembimbing $pembimbing',now())");
            } else {
                session()->setFlashdata("message_bimbingan", '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            }
        } else {
            $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,pokok_bimbingan,create_at) VALUES('" . session()->get('ses_id') . "','$pembimbing','belum dibaca','$keterangan','$pokok_bimbingan',now())");
            session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Bimbingan kepada pembimbing $pembimbing',now())");
        }
        return redirect()->to('/bimbingan_proposal');
    }
    public function baca()
    {
        $id_bimbingan = $this->request->getPost('rowid');
        $this->db->query("UPDATE tb_bimbingan SET status_baca='dibaca' WHERE id_bimbingan=$id_bimbingan");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dibaca','id bimbingan $id_bimbingan dibaca ',now())");
        exit;
    }
    public function hapus()
    {
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        $this->db->query("DELETE FROM tb_bimbingan WHERE id_bimbingan='$id_bimbingan'");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dihapus','id bimbingan $id_bimbingan dihapus ',now())");
        session()->setFlashdata("message_bimbingan", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> menghapus bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
        return redirect()->to('/bimbingan_proposal');
    }
    public function download_berkas()
    {
        $id_bimbingan = $this->request->getPost('id_bimbingan');
        $data = $this->db->query("SELECT * FROM tb_bimbingan where id_bimbingan=$id_bimbingan")->getResult()[0]->berkas;
        return $this->response->download(FCPATH . 'berkas/' . $data, null);
    }
}
