<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Logout extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
