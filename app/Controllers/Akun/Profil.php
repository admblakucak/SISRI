<?php

namespace App\Controllers\Akun;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Profil extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        if (session()->get('ses_id') == '') {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Profil ' . ucfirst(session()->get('ses_login'))
        ];
        return view('Akun/profil', $data);
    }
}
