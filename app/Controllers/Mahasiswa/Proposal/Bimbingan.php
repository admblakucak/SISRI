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
        $data = [
            'title' => 'Bimbingan Proposal'
        ];
        return view('Mahasiswa/Proposal/bimbingan_proposal', $data);
    }
}
