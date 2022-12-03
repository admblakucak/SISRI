<?php

namespace App\Controllers\Korprodi;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Penjadwalan_sidang extends BaseController
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
        $idunit = $this->db->query("SELECT * FROM tb_dosen WHERE nip='" . session()->get('ses_id') . "'")->getResult()[0]->idunit;
        $data = [
            'title' => 'Penjadwalan Sidang',
            'db' => $this->db,
            'idunit' => $idunit,
            'data_jadwal' => $this->db->query("SELECT * FROM tb_jadwal_sidang WHERE idunit='$idunit'")->getResult(),
        ];
        return view('Korprodi/penjadwalan_sidang', $data);
    }
    public function add()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'korprodi') {
            return redirect()->to('/');
        }
        if (!$this->validate([
            'periode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Silahkan berikan keterangan periode'
                ]
            ],
            'open' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tentukan dibuka pendaftaran'
                ]
            ], 'expire' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tentukan ditutup pendaftaran'
                ]
            ], 'jenis_sidang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jenis sidang'
                ]
            ],
        ])) {
            session()->setFlashdata('message', '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
            <span class="alert-inner--text"><strong>Gagal!</strong> ' . $this->validator->listErrors() . '</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            return redirect()->back()->withInput();
        }
        $periode = $this->request->getPost('periode');
        $open = $this->request->getPost('open');
        $expire = $this->request->getPost('expire');
        $jenis_sidang = $this->request->getPost('jenis_sidang');
        $idunit = $this->request->getPost('idunit');
        $this->db->query("INSERT INTO tb_jadwal_sidang (periode,`open`,expire,jenis_sidang,idunit) VALUES ('$periode','$open','$expire','$jenis_sidang','$idunit')");

        session()->setFlashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Menambahkan pendaftaran sidang</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');

        return redirect()->to('/penjadwalan_sidang');
    }
    public function del()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $this->db->query("DELETE FROM tb_jadwal_sidang WHERE id_jadwal='$id_jadwal'");

        session()->setFlashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Menghapus jadwal pendaftaran sidang</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');

        return redirect()->to('/penjadwalan_sidang');
    }
    public function upd()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $periode = $this->request->getPost('periode');
        $open = $this->request->getPost('open');
        $expire = $this->request->getPost('expire');
        $jenis_sidang = $this->request->getPost('jenis_sidang');
        $this->db->query("UPDATE tb_jadwal_sidang SET periode='$periode',`open`='$open',expire='$expire',jenis_sidang='$jenis_sidang' WHERE id_jadwal='$id_jadwal'");

        session()->setFlashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
            <span class="alert-inner--text"><strong>Sukses!</strong> Mengedit jadwal pendaftaran sidang</span>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');

        return redirect()->to('/penjadwalan_sidang');
    }
    public function data_pendaftar()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        if ($id_jadwal == NULL) {
            $id_jadwal = session()->get('ses_id_jadwal');
        }
        $idunit = $this->db->query("SELECT * FROM tb_dosen WHERE nip='" . session()->get('ses_id') . "'")->getResult()[0]->idunit;
        $data = [
            'title' => 'Data Pendaftar Sidang',
            'db' => $this->db,
            'idunit' => $idunit,
            'id_jadwal' => $id_jadwal,
            'data_pendaftar' => $this->db->query("SELECT * FROM tb_pendaftar_sidang WHERE id_jadwal='$id_jadwal'")->getResult(),
        ];
        return view('Korprodi/data_pendaftar_sidang', $data);
    }
    public function setting_jadwal_sidang()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');
        $id_pendaftar = $this->request->getPost('id_pendaftar');
        $waktu_sidang = $this->request->getPost('waktu_sidang');
        $ruang_sidang = $this->request->getPost('ruang_sidang');
        $this->db->query("UPDATE tb_pendaftar_sidang SET waktu_sidang='$waktu_sidang',ruang_sidang='$ruang_sidang' WHERE id_pendaftar='$id_pendaftar'");
        session()->set('ses_id_jadwal', $id_jadwal);
        return redirect()->to('/data_pendaftar');
    }
}
