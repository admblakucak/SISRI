<?php

namespace App\Controllers\Dosen\Proposal;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Validasi_Usulan extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
        //     return redirect()->to('/');
        // }
        // $data = [
        //     'title' => 'Validasi Usulan',
        //     'db' => $this->db,
        //     'data_menunggu' => $this->db->query("SELECT a.*,b.*,c.*,c.`nama` AS nama_topik,d.nama as nama_mhs FROM tb_pengajuan_pembimbing a LEFT JOIN tb_pengajuan_topik b ON a.`nim`=b.nim LEFT JOIN tb_topik c ON b.`id_topik`=c.`idtopik` LEFT JOIN tb_mahasiswa d ON a.`nim`=d.`nim` WHERE nip='" . session()->get('ses_id') . "' AND status_pengajuan='menunggu'")->getResult(),
        //     'data_ditolak' => $this->db->query("SELECT a.*,b.nim AS nim,b.`nip` AS nip,sebagai,status_pengajuan,pesan,reject_at,c.`nama`,e.`nama` AS nama_topik,d.`judul_topik` AS judul FROM tb_penolakan_pengajuan_pembimbing a  LEFT JOIN tb_pengajuan_pembimbing b ON a.`id_pengajuan_pembimbing`=b.`id_pengajuan_pembimbing` LEFT JOIN tb_mahasiswa c ON b.`nim`=c.`nim` LEFT JOIN tb_pengajuan_topik d ON b.`nim`=d.`nim` LEFT JOIN tb_topik e ON d.`id_topik`=e.idtopik WHERE b.nip='" . session()->get('ses_id') . "'")->getResult(),
        //     'data_diterima' => $this->db->query("SELECT d.judul_topik,b.`id_pengajuan_pembimbing`, b.`nim`,c.`nama`,b.`nip`,b.`agree_at`,b.`sebagai`,d.`berkas`,b.`status_pengajuan`,e.`nama` AS nama_topik
        //     FROM tb_pengajuan_pembimbing b LEFT JOIN tb_mahasiswa c ON b.`nim`=c.`nim` LEFT JOIN tb_pengajuan_topik d ON b.`nim`=d.`nim` LEFT JOIN tb_topik e ON d.`id_topik`=e.idtopik WHERE b.nip='" . session()->get('ses_id') . "' AND status_pengajuan='diterima'")->getResult()
        // ];
        // return view('Dosen/Proposal/validasi_usulan', $data);
        echo 'hai';
    }
    public function setujui_validasi($id)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $this->db->query("UPDATE tb_pengajuan_pembimbing SET status_pengajuan='diterima',agree_at=now() WHERE id_pengajuan_pembimbing=$id");
        return redirect()->to('/validasi_usulan');
    }
    public function tolak_validasi()
    {
        $id_pengajuan = $this->request->getPost("id_pengajuan");
        $berkas = $this->request->getPost("berkas");
        $pesan = $this->request->getPost("pesan");
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $this->db->query("UPDATE tb_pengajuan_pembimbing SET status_pengajuan='ditolak',pesan='$pesan',reject_at=now() WHERE id_pengajuan_pembimbing=$id_pengajuan");
        $this->db->query("INSERT INTO tb_penolakan_pengajuan_pembimbing (id_pengajuan_pembimbing,berkas) VALUES ('$id_pengajuan','$berkas')");
        return redirect()->to('/validasi_usulan');
    }
    public function download($jenis, $id)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        if ($jenis == 'menunggu') {
            $data = $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a left join tb_pengajuan_topik b on a.nim=b.nim where id_pengajuan_pembimbing=$id")->getResult();
        } elseif ($jenis == 'tolak_pengajuan') {
            $data = $this->db->query("SELECT * FROM tb_penolakan_pengajuan_pembimbing where id_penolakan_pengajuan_pembimbing=$id")->getResult();
        } else {
            $data = $this->db->query("SELECT * FROM tb_pengajuan_pembimbing a left join tb_pengajuan_topik b on a.nim=b.nim where id_pengajuan_pembimbing=$id")->getResult();
        }

        return $this->response->download(FCPATH . 'berkas/' . $data[0]->berkas, null);
    }
}
