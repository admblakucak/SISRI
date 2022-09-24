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
}
