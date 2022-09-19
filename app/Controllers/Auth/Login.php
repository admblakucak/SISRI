<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Login extends BaseController
{
    public function __construct()
    {
        // $this->encrypter = \Config\Services::encrypter();
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // $encrypter = \Config\Services::encrypter();
        // $plainText  = 'This is a plain-text message!';
        // $ciphertext = $encrypter->encrypt($plainText);
        // echo $ciphertext;
        // // Outputs: This is a plain-text message!
        // echo $encrypter->decrypt($ciphertext);
        echo "aaaaaaaaa";
    }
}
