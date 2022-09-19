<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Unit extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('total_page_unit') == '' && session()->get('total_data_unit') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/unit?page=1&take=1000");
            session()->set('total_page_unit', intval($data->pageCount));
            session()->set('total_data_unit', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_unit');
            $total_data = session()->get('total_data_unit');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_unit")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'title' => 'Data Unit',
            'data' => $this->db->query("SELECT * FROM tb_unit")->getResult(),
            'count_data' => $this->db->query("SELECT count(idunit) as jumlah FROM tb_unit")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(idunit) as count FROM tb_unit where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_unit', $data);
    }
    public function update_data_unit($page)
    {
        set_time_limit(300);
        $this->db->query("DELETE FROM tb_unit WHERE page=$page");
        function add_data_perpage($page, $a)
        {
            $array_data = [];
            $data = $a->api->get_data_api("https://api.trunojoyo.ac.id:8212/siakad/v1/unit?page=$page&take=1000");
            foreach ($data as $key) {
                $nama = '"' . $key->namaunit . '"';
                array_push($array_data, "INSERT INTO tb_unit (idunit,namaunit,jenisunit,idjenjang,parentunit,page) VALUES ('" . $key->idunit . "'," . $nama . ", '" . $key->jenisunit . "', '" . $key->idjenjang . "','" . $key->parentunit . "'" . ",$page)");
            }
            return $array_data;
        }
        $result = add_data_perpage($page, $this);
        for ($i = 0; $i < count($result); $i++) {
            $this->db->query("$result[$i]");
        }
        $this->db->query("INSERT INTO tb_log (`action`,`log`,`user`) VALUES ('insert or update','Update Data Unit Page $page','')");
        return redirect()->to('/data_unit');
    }
}
