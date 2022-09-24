<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Ajukan_Topik extends BaseController
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
        $data_mahasiswa = $this->db->query("SELECT * FROM tb_mahasiswa where nim='" . session()->get('ses_id') . "'")->getResult();
        $idunit = $data_mahasiswa[0]->idunit;
        $data_dosen = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_unit b ON a.`idunit`=b.`idunit` WHERE a.idunit IN (SELECT idunit FROM tb_unit WHERE parentunit=(SELECT parentunit FROM tb_unit WHERE idunit='$idunit')) AND a.`nip` NOT IN (SELECT nip FROM tb_pengajuan_pembimbing WHERE nim='" . session()->get('ses_id') . "' AND (status_pengajuan='diterima' OR status_pengajuan='menunggu'))")->getResult();
        $data_pengajuan_pembimbing_1 = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_pengajuan_pembimbing b ON a.`nip`=b.`nip` LEFT JOIN tb_unit c ON a.`idunit`=c.`idunit` WHERE b.nim='" . session()->get('ses_id') . "' AND b.sebagai='1'")->getResult();
        $data_pengajuan_pembimbing_2 = $this->db->query("SELECT * FROM tb_dosen a LEFT JOIN tb_pengajuan_pembimbing b ON a.`nip`=b.`nip` LEFT JOIN tb_unit c ON a.`idunit`=c.`idunit` WHERE b.nim='" . session()->get('ses_id') . "' AND b.sebagai='2'")->getResult();
        $data_topik = $this->db->query("SELECT * FROM tb_topik where idunit='$idunit'")->getResult();
        $ststbl1 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='1' AND (status_pengajuan='menunggu' OR status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $ststbl2 = $this->db->query("SELECT count(id_pengajuan_pembimbing) as jumlah FROM tb_pengajuan_pembimbing  where nim='" . session()->get('ses_id') . "' AND sebagai='2' AND (status_pengajuan='menunggu' OR status_pengajuan='diterima')")->getResult()[0]->jumlah;
        $data = [
            'title' => 'Ajukan Topik Skripsi',
            'dosen' => $data_dosen,
            'pengajuan_pem1' => $data_pengajuan_pembimbing_1,
            'pengajuan_pem2' => $data_pengajuan_pembimbing_2,
            'ststbl1' => $ststbl1,
            'ststbl2' => $ststbl2,
            'topik' => $data_topik
        ];
        return view('Mahasiswa/ajukan_topik', $data);
    }
    public function ajukan_dospem_1()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $nip = $this->request->getPost("nip");
        $this->db->query("INSERT INTO tb_pengajuan_pembimbing (nim,nip,sebagai) VALUES ('" . session()->get('ses_id') . "','$nip','1')");
        session()->setFlashdata('message_pem1', '
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
		<span class="alert-inner--text"><strong>Sukses!</strong> Pengajuan dosen pembimbing 1 berhasil.</span>
		<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>');
        return redirect()->to('/ajukan_topik_mahasiswa');
    }
    public function ajukan_dospem_2()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $nip = $this->request->getPost("nip");
        $this->db->query("INSERT INTO tb_pengajuan_pembimbing (nim,nip,sebagai) VALUES ('" . session()->get('ses_id') . "','$nip','2')");
        session()->setFlashdata('message_pem2', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Pengajuan dosen pembimbing 2 berhasil.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
        return redirect()->to('/ajukan_topik_mahasiswa');
    }
}
