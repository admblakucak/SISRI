<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Beranda extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'dosen') {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Beranda Dosen'
        ];
        return view('Dosen/beranda_dosen', $data);
    }
}
