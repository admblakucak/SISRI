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
}
