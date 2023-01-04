<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Nilai extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data_mhs = [];
        $data_mhs_bimbingan = $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit`, d.* FROM tb_pengajuan_pembimbing a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` LEFT JOIN tb_profil_tambahan d ON a.`nim`=d.`id` WHERE nip='$id' AND status_pengajuan='diterima'")->getResult();
        foreach ($data_mhs_bimbingan as $key) {
            if ($key->image != NULL) {
                $image = $key->image;
            } else {
                $image = 'Profile_Default.png';
            }
            $data = [
                'nim' => $key->nim,
                'nama_mhs' => $key->nama_mhs,
                'jk' => $key->jk,
                'namaunit' => $key->namaunit,
                'image' => $image,
                'sebagai' => $key->sebagai,
            ];
            array_push($data_mhs, $data);
        }
        $data = [
            'title' => 'Nilai Bimbingan',
            'db' => $this->db,
            'data_mhs_bimbingan' => $data_mhs,
        ];
        return view('Dosen/input_nilai_bimbingan', $data);
    }
    public function nilai_skripsi()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $data_mhs = [];
        $data_mhs_uji = $this->db->query("SELECT a.*,b.`nama` AS nama_mhs, b.`jk`, c.`namaunit`, d.* FROM tb_penguji a LEFT JOIN tb_mahasiswa b ON b.`nim`=a.`nim` LEFT JOIN tb_unit c ON b.`idunit`=c.`idunit` LEFT JOIN tb_profil_tambahan d ON a.`nim`=d.`id` WHERE nip='$id' AND a.status='aktif'")->getResult();
        foreach ($data_mhs_uji as $key) {
            if ($key->image != NULL) {
                $image = $key->image;
            } else {
                $image = 'Profile_Default.png';
            }
            $data = [
                'nim' => $key->nim,
                'nama_mhs' => $key->nama_mhs,
                'jk' => $key->jk,
                'namaunit' => $key->namaunit,
                'image' => $image,
                'sebagai' => $key->sebagai,
            ];
            array_push($data_mhs, $data);
        }
        $data = [
            'title' => 'Nilai Ujian Skripsi',
            'db' => $this->db,
            'data_mhs_uji' => $data_mhs,
        ];
        return view('Dosen/input_nilai_skripsi', $data);
    }
    public function save_nilai_bimbingan()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $nim = $this->request->getPost('nim');
        $nilai = $this->request->getPost('nilai');
        $sebagai = $this->request->getPost('sebagai');
        $d_nilai = $this->db->query("SELECT * FROM tb_nilai WHERE nim='" . $nim . "' AND nip='" . session()->get('ses_id') . "' AND sebagai='" . $sebagai . "'")->getResult();
        if ($sebagai == 'pembimbing 1') {
            // $status = $this->request->getPost('status');
            // $id_pendaftar = $this->request->getPost('id_pendaftar');
            // $this->db->query("UPDATE tb_pendaftar_sidang SET hasil_sidang='$status' WHERE id_pendaftar='$id_pendaftar'");
            if (empty($d_nilai)) {
                $this->db->query("INSERT INTO tb_nilai (nim,nip,sebagai,nilai) VALUES ('$nim','" . session()->get('ses_id') . "','$sebagai','$nilai')");
            } else {
                $this->db->query("UPDATE tb_nilai SET nilai = '$nilai' WHERE nim='$nim' AND nip='" . session()->get('ses_id') . "' AND sebagai='$sebagai'");
            }
        } else {
            if (empty($d_nilai)) {
                $this->db->query("INSERT INTO tb_nilai (nim,nip,sebagai,nilai) VALUES ('$nim','" . session()->get('ses_id') . "','$sebagai','$nilai')");
            } else {
                $this->db->query("UPDATE tb_nilai SET nilai = '$nilai' WHERE nim='$nim' AND nip='" . session()->get('ses_id') . "' AND sebagai='$sebagai'");
            }
        }
        return redirect()->to('/input_nilai_bimbingan');
    }
    public function save_nilai_skripsi()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') == 'mahasiswa') {
            return redirect()->to('/');
        }
        $nim = $this->request->getPost('nim');
        $nilai = $this->request->getPost('nilai');
        $sebagai = $this->request->getPost('sebagai');
        $d_nilai = $this->db->query("SELECT * FROM tb_nilai WHERE nim='" . $nim . "' AND nip='" . session()->get('ses_id') . "' AND sebagai='" . $sebagai . "'")->getResult();
        if ($sebagai == 'pembimbing 1') {
            // $status = $this->request->getPost('status');
            // $id_pendaftar = $this->request->getPost('id_pendaftar');
            // $this->db->query("UPDATE tb_pendaftar_sidang SET hasil_sidang='$status' WHERE id_pendaftar='$id_pendaftar'");
            if (empty($d_nilai)) {
                $this->db->query("INSERT INTO tb_nilai (nim,nip,sebagai,nilai) VALUES ('$nim','" . session()->get('ses_id') . "','$sebagai','$nilai')");
            } else {
                $this->db->query("UPDATE tb_nilai SET nilai = '$nilai' WHERE nim='$nim' AND nip='" . session()->get('ses_id') . "' AND sebagai='$sebagai'");
            }
        } else {
            if (empty($d_nilai)) {
                $this->db->query("INSERT INTO tb_nilai (nim,nip,sebagai,nilai) VALUES ('$nim','" . session()->get('ses_id') . "','$sebagai','$nilai')");
            } else {
                $this->db->query("UPDATE tb_nilai SET nilai = '$nilai' WHERE nim='$nim' AND nip='" . session()->get('ses_id') . "' AND sebagai='$sebagai'");
            }
        }
        return redirect()->to('/input_nilai_skripsi');
    }
}
