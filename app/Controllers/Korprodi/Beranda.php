<?php

namespace App\Controllers\Korprodi;

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
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'korprodi') {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Beranda Korprodi'
        ];
        return view('Korprodi/beranda_korprodi', $data);
    }
}
