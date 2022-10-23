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
            'title' => 'Bimbingan Proposal Dosen',
            'db' => $this->db,
            'data_mhs_bimbingan' => $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit` FROM tb_pengajuan_pembimbing a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` WHERE nip='$id' AND status_pengajuan='diterima'")->getResult(),
        ];
        return view('Dosen/Proposal/data_bimbingan', $data);
    }
}
