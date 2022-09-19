<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Periode extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('total_page_periode') == '' && session()->get('total_data_periode') == '') {
            $data = $this->api->get_meta_api("https://api.trunojoyo.ac.id:8212/siakad/v1/periode?page=1&take=1000");
            session()->set('total_page_periode', intval($data->pageCount));
            session()->set('total_data_periode', intval($data->itemCount));
            $total_page = intval($data->pageCount);
            $total_data = intval($data->itemCount);
        } else {
            $total_page = session()->get('total_page_periode');
            $total_data = session()->get('total_data_periode');
        }
        $max_page = $this->db->query("SELECT max(page) as max FROM tb_periode")->getResult()[0]->max;
        if ($max_page == null) {
            $max_page = 0;
        }
        $data = [
            'title' => 'Data Periode',
            'data' => $this->db->query("SELECT * FROM tb_periode")->getResult(),
            'count_data' => $this->db->query("SELECT count(idperiode) as jumlah FROM tb_periode")->getResult()[0]->jumlah,
            'total_page' => $total_page,
            'db' => $this->db,
            'max_page' => $max_page,
            'total_data' => $total_data,
            'count_data_max_page' => $this->db->query("SELECT count(idperiode) as count FROM tb_periode where page=$max_page")->getResult()[0]->count
        ];
        return view('Admin/data_periode', $data);
    }
    public function update_data_periode($page)
    {
        set_time_limit(300);
        $this->db->query("DELETE FROM tb_periode WHERE page=$page");
        function add_data_perpage($page, $a)
        {
            $array_data = [];
            $data = $a->api->get_data_api("https://api.trunojoyo.ac.id:8212/siakad/v1/periode?page=$page&take=1000");
            foreach ($data as $key) {
                $nama = '"' . $key->namaperiode . '"';
                array_push($array_data, "INSERT INTO tb_periode (idperiode,namaperiode,page) VALUES ('" . $key->idperiode . "'," . $nama . ",$page)");
            }
            return $array_data;
        }
        $result = add_data_perpage($page, $this);
        print_r($result);
        for ($i = 0; $i < count($result); $i++) {
            $this->db->query("$result[$i]");
        }
        $this->db->query("INSERT INTO tb_log (`action`,`log`,`user`) VALUES ('insert or update','Update Data periode Page $page','')");
        return redirect()->to('/data_periode');
    }
}
