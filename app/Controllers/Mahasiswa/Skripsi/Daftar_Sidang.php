<?php

namespace App\Controllers\Mahasiswa\Skripsi;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Daftar_Sidang extends BaseController
{
    public function __construct()
    {
        $this->api = new Access_API();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id = session()->get('ses_id');
        $idunit_mhs = $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim='$id'")->getResult()[0]->idunit;
        $data = [
            'title' => 'Daftar Sidang Skripsi',
            'db' => $this->db,
            'idunit_mhs' => $idunit_mhs,
            'pem1' => $this->db->query("SELECT a.*,b.`nama`,b.`gelardepan`,b.`gelarbelakang`,c.* FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip` = c.`id` WHERE a.nim='$id' AND a.sebagai='1' AND a.status_pengajuan='diterima'")->getResult()[0],
            'pem2' => $this->db->query("SELECT a.*,b.`nama`,b.`gelardepan`,b.`gelarbelakang`,c.* FROM tb_pengajuan_pembimbing a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip` = c.`id` WHERE a.nim='$id' AND a.sebagai='2' AND a.status_pengajuan='diterima'")->getResult()[0],
            'kor' => $this->db->query("SELECT a.*,b.`nama`,b.`gelardepan`,b.`gelarbelakang`,c.* FROM tb_korprodi a LEFT JOIN tb_dosen b ON a.`nip`=b.`nip` LEFT JOIN tb_profil_tambahan c ON a.`nip` = c.`id` WHERE a.idunit='$idunit_mhs'")->getResult()[0],
            'data_jadwal' => $this->db->query("SELECT * FROM tb_jadwal_sidang where jenis_sidang='sidang skripsi'")->getResult(),
        ];
        return view('Mahasiswa/Skripsi/daftar_sidang', $data);
    }
    public function izin()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $nip = $this->request->getPost('nip');
        $nim = $this->request->getPost('nim');
        $sebagai = $this->request->getPost('sebagai');
        $idunit = $this->request->getPost('idunit');
        $status = $this->db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND nip='" . $nip . "' AND `izin_sebagai`='$sebagai' AND jenis_sidang='skripsi'")->getResult();
        $cek_koor = $this->db->query("SELECT * FROM tb_korprodi WHERE nip='$nip' AND idunit='$idunit'")->getResult();
        $cek_pembimbing = $this->db->query("SELECT * FROM tb_pengajuan_pembimbing WHERE nip='$nip' AND nim='$nim' AND status_pengajuan='diterima'")->getResult();

        if (count($status) == NULL) {
            if ($sebagai == 'koordinator') {
                if (count($cek_pembimbing) != NULL) {
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','$sebagai','menunggu','$idunit')");
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','pembimbing " . $cek_pembimbing[0]->sebagai . "','menunggu','$idunit')");
                } else {
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','$sebagai','menunggu','$idunit')");
                }
            } else {
                if (count($cek_koor) != NULL) {
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','koordinator','menunggu','$idunit')");
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','$sebagai','menunggu','$idunit')");
                } else {
                    $this->db->query("INSERT INTO tb_perizinan_sidang (nim,nip,jenis_sidang,izin_sebagai,`status`,idunit) VALUES ('$nim','$nip','skripsi','$sebagai','menunggu','$idunit')");
                }
            }
        } else {
            if ($status[0]->status == 'ditolak') {
                if ($sebagai == 'koordinator') {
                    if (count($cek_pembimbing) != NULL) {
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE id_perizinan_sidang='" . $status[0]->id_perizinan_sidang . "'");
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE nip='$nip' AND nim='$nim' AND izin_sebagai='pembimbing " . $cek_pembimbing[0]->sebagai . "' AND jenis_sidang='skripsi'");
                    } else {
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE id_perizinan_sidang='" . $status[0]->id_perizinan_sidang . "'");
                    }
                } else {
                    if (count($cek_koor) != NULL) {
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE nip='$nip' AND nim='$nim' AND izin_sebagai='koordinator' AND jenis_sidang='skripsi'");
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE id_perizinan_sidang='" . $status[0]->id_perizinan_sidang . "'");
                    } else {
                        $this->db->query("UPDATE tb_perizinan_sidang SET `status`='menunggu' WHERE id_perizinan_sidang='" . $status[0]->id_perizinan_sidang . "'");
                    }
                }
            }
        }
        return redirect()->to('/daftar_sidang');
    }
    public function mendaftar()
    {
        if (session()->get('ses_id') == '' || session()->get('ses_login') != 'mahasiswa') {
            return redirect()->to('/');
        }
        $id_jadwal = $this->request->getPost('id_jadwal');
        $this->db->query("INSERT INTO tb_pendaftar_sidang (nim,id_jadwal) VALUES ('" . session()->get('ses_id') . "','$id_jadwal')");
        return redirect()->to('/daftar_sidang');
    }
}
