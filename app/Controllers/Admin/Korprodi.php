<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Korprodi extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        $data = [
            'tab' => 'Data Dosen',
            'title' => 'Data Korprodi',
            'db' => $this->db,
            'data' => $this->db->query("SELECT a.*,b.`nama`,b.`gelardepan`,b.`gelarbelakang` FROM (SELECT a.*,b.`namaunit` AS fakultas FROM
            (SELECT a.*,b.`namaunit` AS jurusan, b.`parentunit` AS idunitfakultas
            FROM (SELECT a.*,b.`namaunit` AS prodi,b.`parentunit` AS idunitjurusan FROM tb_korprodi a  LEFT JOIN tb_unit b ON a.`idunit`=b.`idunit`) AS a 
            LEFT JOIN tb_unit b ON a.idunitjurusan = b.`idunit`) AS a
            LEFT JOIN tb_unit b ON a.idunitfakultas = b.`idunit`) AS a
            LEFT JOIN tb_dosen b ON a.nip=b.`nip`")->getResult(),
            'prodi' => $this->db->query("SELECT a.*,b.`namaunit` AS fakultas FROM
            (SELECT a.*,b.`namaunit` AS jurusan, b.`parentunit` AS idunitfakultas
            FROM (SELECT *,parentunit AS idunitjurusan FROM tb_unit ) AS a 
            LEFT JOIN tb_unit b ON a.idunitjurusan = b.`idunit`) AS a
            LEFT JOIN tb_unit b ON a.idunitfakultas = b.`idunit` WHERE a.jenisunit='P'")->getResult(),
            'dosen' => $this->db->query("SELECT * FROM tb_dosen")->getResult()

        ];
        return view('Admin/data_korprodi', $data);
    }
    public function add()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        if (!$this->validate([
            'idunit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Program Studi'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Dosen sebagai Koordiniator Prodi'
                ]
            ]
        ])) {
            session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> ' . $this->validator->listErrors() . '</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->to('/data_korprodi');
        }
        $idunit = $this->request->getPost("idunit");
        $nip = $this->request->getPost("nip");
        $cek_idunit = $this->db->query("SELECT * FROM tb_korprodi WHERE idunit='$idunit'")->getResult();
        $cek_nip = $this->db->query("SELECT * FROM tb_korprodi WHERE idunit='$idunit'")->getResult();
        if (count($cek_idunit) != NULL) {
            session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> Program studi sudah ada.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->to('/data_korprodi');
        }
        if (count($cek_nip) != NULL) {
            session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> Dosen sudah terpilih sebagai koordinator program studi.</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->to('/data_korprodi');
        }
        $this->db->query("INSERT INTO tb_korprodi (idunit,nip) VALUES ('$idunit','$nip')");
        session()->setFlashdata('message', '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Menambahkan koordinator program studi</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
        return redirect()->to('/data_korprodi');
    }
    public function delete()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'admin') {
            return redirect()->to('/');
        }
        $id_korprodi = $this->request->getPost("id_korprodi");
        $this->db->query("DELETE FROM tb_korprodi WHERE id_korprodi = $id_korprodi");
        session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Menghapus koordinator program studi</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
        return redirect()->to('/data_korprodi');
    }
}
