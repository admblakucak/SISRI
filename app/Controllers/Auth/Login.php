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
        // session()->destroy();
        return view('Login/login2');
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
                    $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Mahasiswa',now())");
                    return redirect()->to('/beranda_mahasiswa');
                } elseif ($data[0]->role == 'dosen') {
                    $cek_kor = $this->db->query("SELECT * FROM tb_korprodi where nip='" . $data[0]->id . "'")->getResult();
                    if (count($cek_kor) > 0) {
                        session()->set('ses_login', 'korprodi');
                        session()->set('ses_id', $data[0]->id);
                        session()->set('ses_nama', name($this->db, $data[0]->id));
                        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Korprodi',now())");
                        return redirect()->to('/beranda_korprodi');
                    } else {
                        session()->set('ses_login', 'dosen');
                        session()->set('ses_id', $data[0]->id);
                        session()->set('ses_nama', name($this->db, $data[0]->id));
                        $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Dosen',now())");
                        return redirect()->to('/beranda_dosen');
                    }
                } else {
                    session()->set('ses_login', 'admin');
                    session()->set('ses_id', 'admin');
                    session()->set('ses_nama', 'ADMIN');
                    $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Admin',now())");
                    return redirect()->to('/beranda_admin');
                }
            } else {
                session()->setFlashdata('message', '<p class="text-danger">Username dan Password salah.</p>');
                return redirect()->to('/');
            }
        } else {
            $data_master_mhs = $this->db->query("SELECT * FROM tb_mahasiswa where nim='$username' or email='$username'")->getResult();
            $data_master_dosen = $this->db->query("SELECT * FROM tb_dosen where nip='$username' or email='$username'")->getResult();
            if (count($data_master_mhs) > 0) {
                if ($username == $data_master_mhs[0]->nim || $username == $data_master_mhs[0]->email) {
                    if ($pass == $data_master_mhs[0]->nim) {
                        $email = $data_master_mhs[0]->email;
                        $status_authorize = $this->api->authorize("$email");
                        if ($status_authorize->code == 200) {
                            $ciphertext = password_hash($pass, PASSWORD_DEFAULT);
                            $this->db->query("INSERT INTO tb_users (id,email,password,role) VALUES ('" . $data_master_mhs[0]->nim . "','" . $data_master_mhs[0]->email . "','" . $ciphertext . "','mahasiswa')");
                            $this->db->query("INSERT INTO tb_pengajuan_topik (nim) VALUES ('" . $data_master_mhs[0]->nim . "')");
                            session()->set('ses_login', 'mahasiswa');
                            session()->set('ses_id', $data_master_mhs[0]->nim);
                            session()->set('ses_nama', name($this->db, $data_master_mhs[0]->nim));
                            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Pertama Mahasiswa',now())");
                            return redirect()->to('/beranda_mahasiswa');
                        } else {
                            session()->setFlashdata('message', '<p class="text-danger">' . $status_authorize->message . '</p>');
                            return redirect()->to('/');
                        }
                    } else {
                        session()->setFlashdata('message', '<p class="text-danger">Username dan Password salah.</p>');
                        return redirect()->to('/');
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
                            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Pertama Korprodi',now())");
                            return redirect()->to('/beranda_korprodi');
                        } else {
                            session()->set('ses_login', 'dosen');
                            session()->set('ses_id', $data_master_dosen[0]->nip);
                            session()->set('ses_nama', name($this->db, $data_master_dosen[0]->nip));
                            $this->db->query("INSERT INTO tb_log (user,`action`,`log`,date_time) VALUES ('" . session()->get('ses_id') . "','login','Login Pertama Dosen',now())");
                            return redirect()->to('/beranda_dosen');
                        }
                    } else {
                        session()->setFlashdata('message', '<p class="text-danger">Username dan Password salah.</p>');
                        return redirect()->to('/');
                    }
                }
            } else {
                session()->setFlashdata('message', '<p class="text-danger">Anda tidak terdaftar dalam Universitas Trunojoyo Madura</p>');
                return redirect()->to('/');
            }
        }
    }
}
