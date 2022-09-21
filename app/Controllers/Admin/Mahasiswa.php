<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
        $session = \Config\Services::session();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        if (session()->get('total_page_mhs') == '' && session()->get('total_data_mhs') == '') {
            $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
            session()->set('total_data_mhs', intval($data1->itemCount));
            $total_data = intval($data1->itemCount);
        } else {
            $total_data = session()->get('total_data_mhs');
        }
        $data = [
            'tab' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='F'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nim) as jumlah FROM tb_mahasiswa")->getResult()[0]->jumlah,
            'db' => $this->db,
            'total_data' => $total_data
        ];
        return view('Admin/data_fakultas', $data);
    }
    public function jurusan_mhs($id)
    {

        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        if (session()->get('total_page_mhs') == '' && session()->get('total_data_mhs') == '') {
            $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
            session()->set('total_data_mhs', intval($data1->itemCount));
            $total_data = intval($data1->itemCount);
        } else {
            $total_data = session()->get('total_data_mhs');
        }
        $data = [
            'nama_fakultas' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'tab' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='J' and parentunit='$id'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nim) as jumlah FROM tb_mahasiswa")->getResult()[0]->jumlah,
            'db' => $this->db,
            'total_data' => $total_data
        ];
        return view('Admin/data_jurusan', $data);
    }
    public function prodi_mhs($id)
    {

        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        if (session()->get('total_page_mhs') == '' && session()->get('total_data_mhs') == '') {
            $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
            session()->set('total_data_mhs', intval($data1->itemCount));
            $total_data = intval($data1->itemCount);
        } else {
            $total_data = session()->get('total_data_mhs');
        }
        $data = [
            'nama_jurusan' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'tab' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='P' and parentunit='$id'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nim) as jumlah FROM tb_mahasiswa")->getResult()[0]->jumlah,
            'db' => $this->db,
            'total_data' => $total_data
        ];
        return view('Admin/data_prodi', $data);
    }
    public function angkatan_mhs($id)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        session()->set('id_prodi', $id);
        session()->set('prodi', $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit);
        if (session()->get('total_page_mhs') == '' && session()->get('total_data_mhs') == '') {
            $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
            session()->set('total_data_mhs', intval($data1->itemCount));
            $total_data = intval($data1->itemCount);
        } else {
            $total_data = session()->get('total_data_mhs');
        }
        $data = [
            'nama_jurusan' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'tab' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'data' => $this->db->query("SELECT * FROM tb_periode WHERE idperiode IN (SELECT DISTINCT idperiode FROM tb_mahasiswa WHERE idunit='$id')")->getResult(),
            'count_data' => $this->db->query("SELECT count(nim) as jumlah FROM tb_mahasiswa")->getResult()[0]->jumlah,
            'db' => $this->db,
            'total_data' => $total_data
        ];
        return view('Admin/data_angkatan', $data);
    }
    public function detail_data_mhs($id_prodi, $id_periode)
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        session()->set('periode', $this->db->query("SELECT * FROM tb_periode where idperiode='$id_periode'")->getResult()[0]->namaperiode);
        if (session()->get('total_page_mhs') == '' && session()->get('total_data_mhs') == '') {
            $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
            session()->set('total_data_mhs', intval($data1->itemCount));
            $total_data = intval($data1->itemCount);
        } else {
            $total_data = session()->get('total_data_mhs');
        }
        $data = [
            'tab' => 'Data Mahasiswa',
            'title' => 'Data Mahasiswa',
            'data' => $this->db->query("SELECT * FROM tb_mahasiswa WHERE idunit='$id_prodi' AND idperiode='$id_periode'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nim) as jumlah FROM tb_mahasiswa")->getResult()[0]->jumlah,
            'db' => $this->db,
            'total_data' => $total_data
        ];
        return view('Admin/data_mahasiswa', $data);
    }
    public function update_data_mhs()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ini_set('max_input_time', 0);
        $data1 = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=1&take=1000");
        $total_page = intval($data1->pageCount);
        function add_data($page, $a)
        {
            $array_data = [];
            $data = $a->api->get_data_api("https://api.trunojoyo.ac.id:8212/siakad/v1/mahasiswa?page=$page&take=1000");
            foreach ($data as $key) {
                $nama = '"' . $key->nama . '"';
                $cek_data = $a->db->query("SELECT count(nim) as jumlah from tb_mahasiswa where nim='$key->nim'")->getResult()[0]->jumlah;
                if ($cek_data == 0) {
                    array_push($array_data, "INSERT INTO tb_mahasiswa (nim, nama, jk, idunit, idperiode, email, `page`) VALUES ('$key->nim', " . $nama . ", '$key->jk','$key->idunit','$key->idperiode','$key->email','$page')");
                }
            }
            return $array_data;
        }
        $r = [];
        for ($i = 1; $i <= $total_page; $i++) {
            $result = add_data($i, $this);
            $r = array_merge($r, $result);
        }
        for ($i = 0; $i < count($r); $i++) {
            $this->db->query("$r[$i]");
        }
        $this->db->query("INSERT INTO tb_log (`action`,`log`,`user`) VALUES ('insert or update','Update Data Mahasiswa','')");
        return redirect()->to('/data_mahasiswa');
    }
}
