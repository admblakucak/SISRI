<?php

namespace App\Controllers\Mahasiswa\Proposal;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Revisi extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index($how)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data = [
            'title' => 'Bimbingan Revisi Proposal',
            'how' => $how,
            'db' => $this->db,
            'dosen_pembimbing' => $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip`=c.`id` WHERE a.nim='" . $id . "' AND a.status_pengajuan='diterima'")->getResult(),
            'progress_bimbingan' => $this->db->query("SELECT * FROM tb_bimbingan a LEFT JOIN tb_profil_tambahan b ON a.`from`=b.`id` WHERE (a.`from` = '" . $id . "' OR a.`to` = '" . $id . "') AND (a.`from` = '" . $how . "' OR a.`to` = '" . $how . "') ORDER BY create_at ASC")->getResult(),
        ];
        $this->db->query("UPDATE tb_bimbingan SET status_baca='dibaca' WHERE `from`=$how AND status_baca='belum dibaca'");
        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan Dibaca','Bimbingan $how dibaca ',now())");
        return view('Mahasiswa/Proposal/bimbingan_proposal', $data);
    }
    public function tambah()
    {
        $pokok_bimbingan = $this->request->getPost('pokok_bimbingan');
        $keterangan = $this->request->getPost('keterangan');
        $berkas = $this->request->getFile('berkas');
        $pembimbing = $this->request->getPost('pembimbing');
        $name = $berkas->getRandomName();
        if ($berkas->getName() != '') {
            if ($berkas->move(WRITEPATH . '../public/berkas/', $name)) {
                $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,berkas,pokok_bimbingan,create_at,kategori_bimbingan) VALUES('" . session()->get('ses_id') . "','$pembimbing','belum dibaca','$keterangan','$name','$pokok_bimbingan',now(),1)");
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
            $this->db->query("INSERT INTO tb_bimbingan (`from`,`to`,status_baca,keterangan,pokok_bimbingan,create_at,kategori_bimbingan) VALUES('" . session()->get('ses_id') . "','$pembimbing','belum dibaca','$keterangan','$pokok_bimbingan',now(),1)");
            session()->setFlashdata("message_bimbingan", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> kirim bimbingan.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','Bimbingan','Bimbingan kepada pembimbing $pembimbing',now())");
        }
        return redirect()->to("/bimbingan_proposal/$pembimbing");
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
