<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Dosen extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('total_page_ds') == '' && session()->get('total_data_ds') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/dosen?page=1&take=1000");
            session()->set('total_page_ds', intval($data->pageCount));
            session()->set('total_data_ds', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_ds');
            $total_data = session()->get('total_data_ds');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_dosen")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'tab' => 'Data Dosen',
            'title' => 'Data Fakultas',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='F'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nip) as jumlah FROM tb_dosen")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(nip) as count FROM tb_dosen where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_fakultas', $data);
    }
    public function jurusan_dosen($id)
    {
        if (session()->get('total_page_ds') == '' && session()->get('total_data_ds') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/dosen?page=1&take=1000");
            session()->set('total_page_ds', intval($data->pageCount));
            session()->set('total_data_ds', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_ds');
            $total_data = session()->get('total_data_ds');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_dosen")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'nama_fakultas' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'tab' => 'Data Dosen',
            'title' => 'Data Jurusan',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='J' and parentunit='$id'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nip) as jumlah FROM tb_dosen")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(nip) as count FROM tb_dosen where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_jurusan', $data);
    }
    public function prodi_dosen($id)
    {
        if (session()->get('total_page_ds') == '' && session()->get('total_data_ds') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/dosen?page=1&take=1000");
            session()->set('total_page_ds', intval($data->pageCount));
            session()->set('total_data_ds', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_ds');
            $total_data = session()->get('total_data_ds');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_dosen")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'nama_jurusan' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'tab' => 'Data Dosen',
            'title' => 'Data Jurusan',
            'data' => $this->db->query("SELECT * FROM tb_unit where jenisunit='P' and parentunit='$id'")->getResult(),
            'count_data' => $this->db->query("SELECT count(nip) as jumlah FROM tb_dosen")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(nip) as count FROM tb_dosen where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_prodi', $data);
    }
    public function detail_data_dosen($id)
    {
        if (session()->get('total_page_ds') == '' && session()->get('total_data_ds') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/dosen?page=1&take=1000");
            session()->set('total_page_ds', intval($data->pageCount));
            session()->set('total_data_ds', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_ds');
            $total_data = session()->get('total_data_ds');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_dosen")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'nama_prodi' => $this->db->query("SELECT * FROM tb_unit where idunit='$id'")->getResult()[0]->namaunit,
            'title' => 'Data Dosen',
            'data' => $this->db->query("SELECT a.*,b.`namaunit` FROM tb_dosen a LEFT JOIN tb_unit b ON a.`idunit`=b.`idunit` WHERE a.idunit='$id'")->getResult(),
            'korprodi' => $this->db->query("SELECT COUNT(a.nip) AS cek,a.nip,b.namaunit FROM tb_korprodi a left join tb_unit b on a.idunit=b.idunit WHERE a.idunit='$id'")->getResult()[0],
            'count_data' => $this->db->query("SELECT count(nip) as jumlah FROM tb_dosen")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(nip) as count FROM tb_dosen where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_dosen', $data);
    }
    public function update_data_dosen($page)
    {
        set_time_limit(300);
        $this->db->query("DELETE FROM tb_dosen WHERE page=$page");
        function add_data_mhs_perpage($page, $a)
        {
            $array_data = [];
            $data = $a->api->get_data_api("https://api.trunojoyo.ac.id:8212/siakad/v1/dosen?page=$page&take=1000");
            foreach ($data as $key) {
                $nama = '"' . $key->nama . '"';
                $nip = preg_replace("/[^0-9]/", "", $key->nip);
                $nidn = preg_replace("/[^0-9]/", "", $key->nidn);
                array_push($array_data, "INSERT INTO tb_dosen (nip,nidn,nama,gelardepan,gelarbelakang,jk,idunit,email,page) VALUES ('" . $nip . "','" . $nidn . "', " . $nama . ", '" . $key->gelardepan . "','" . $key->gelarbelakang . "','" . $key->jk . "','" . $key->idunit . "','" . $key->email . "',$page)");
            }
            return $array_data;
        }
        $result = add_data_mhs_perpage($page, $this);
        for ($i = 0; $i < count($result); $i++) {
            $this->db->query("$result[$i]");
        }
        $this->db->query("INSERT INTO tb_log (`action`,`log`,`user`) VALUES ('insert or update','Update Data dosen Page $page','')");
        return redirect()->to('/data_dosen');
    }
}
