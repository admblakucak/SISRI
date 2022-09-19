<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Login extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        // echo password_hash('admin', PASSWORD_DEFAULT);
        session()->destroy();
        return view('Login/login');
    }
    public function proses_login()
    {
        function name($a, $id)
        {
            $data_master_mhs = $a->query("SELECT * FROM tb_mahasiswa WHERE nim='" . $id . "'")->getResult();
            $data_master_dosen = $a->query("SELECT * FROM tb_dosen where nip='" . $id . "'")->getResult();
            if (count($data_master_mhs) > 0) {
                return $data_master_mhs[0]->nama;
            } elseif (count($data_master_dosen) > 0) {
                return $data_master_dosen[0]->nama;
            } else {
            }
        }
        $username = $this->request->getPost("username");
        $pass = $this->request->getPost("password");
        $data = $this->db->query("SELECT * FROM tb_users where id='$username' or email='$username'")->getResult();
        if (count($data) > 0) {
            if (password_verify($pass, $data[0]->password)) {
                if ($data[0]->role == 'mahasiswa') {
                    session()->set('ses_login', 'mahasiswa');
                    session()->set('ses_id', $data[0]->id);
                    session()->set('ses_nama', name($this->db, $data[0]->id));
                    return redirect()->to('/beranda_mahasiswa');
                } elseif ($data[0]->role == 'dosen') {
                    $cek_kor = $this->db->query("SELECT * FROM tb_korprodi where nip='" . $data[0]->id . "'")->getResult();
                    var_dump($cek_kor);
                    if (count($cek_kor) > 0) {
                        session()->set('ses_login', 'korprodi');
                        session()->set('ses_id', $data[0]->id);
                        session()->set('ses_nama', name($this->db, $data[0]->id));
                        return redirect()->to('/validasi_usulan');
                    } else {
                        session()->set('ses_login', 'dosen');
                        session()->set('ses_id', $data[0]->id);
                        session()->set('ses_nama', name($this->db, $data[0]->id));
                        return redirect()->to('/Beranda');
                    }
                } else {
                    session()->set('ses_login', 'admin');
                    session()->set('ses_id', 'admin');
                    session()->set('ses_nama', 'ADMIN');
                    return redirect()->to('/data_mahasiswa');
                }
            } else {
                echo 'Username dan Password salah.';
            }
        } else {
            $data_master_mhs = $this->db->query("SELECT * FROM tb_mahasiswa where nim='$username' or email='$username'")->getResult();
            $data_master_dosen = $this->db->query("SELECT * FROM tb_dosen where nip='$username' or email='$username'")->getResult();
            if (count($data_master_mhs) > 0) {
                if ($username == $data_master_mhs[0]->nim || $username == $data_master_mhs[0]->email) {
                    if ($pass == $data_master_mhs[0]->nim) {
                        $ciphertext = password_hash($pass, PASSWORD_DEFAULT);
                        $this->db->query("INSERT INTO tb_users (id,email,password,role) VALUES ('" . $data_master_mhs[0]->nim . "','" . $data_master_mhs[0]->email . "','" . $ciphertext . "','mahasiswa')");
                        session()->set('ses_login', 'mahasiswa');
                        session()->set('ses_id', $data_master_mhs[0]->nim);
                        session()->set('ses_nama', name($this->db, $data_master_mhs[0]->nim));
                        return redirect()->to('/beranda_mahasiswa');
                    } else {
                        echo "Username dan Password salah.";
                    }
                }
            } elseif (count($data_master_dosen) > 0) {
                if ($username == $data_master_dosen[0]->nip || $username == $data_master_dosen[0]->email) {
                    if ($pass == $data_master_dosen[0]->nip) {
                        $ciphertext = password_hash($pass, PASSWORD_DEFAULT);
                        $this->db->query("INSERT INTO tb_users (id,email,password,role) VALUES ('" . $data_master_dosen[0]->nip . "','" . $data_master_dosen[0]->email . "','" . $ciphertext . "','dosen')");
                        $cek_kor = $this->db->query("SELECT * FROM tb_korprodi where nip='" . $data_master_dosen[0]->nip . "'")->getResult();
                        var_dump($cek_kor);
                        if (count($cek_kor) > 0) {
                            session()->set('ses_login', 'korprodi');
                            session()->set('ses_id', $data_master_dosen[0]->nip);
                            session()->set('ses_nama', name($this->db, $data_master_dosen[0]->nip));
                            return redirect()->to('/validasi_usulan');
                        } else {
                            session()->set('ses_login', 'dosen');
                            session()->set('ses_id', $data_master_dosen[0]->nip);
                            session()->set('ses_nama', name($this->db, $data_master_dosen[0]->nip));
                            return redirect()->to('/Beranda');
                        }
                    } else {
                        echo "Username dan Password salah.";
                    }
                }
            } else {
                echo "Anda tidak terdaftar dalam Universitas Trunojoyo Madura";
            }
        }
    }
}
