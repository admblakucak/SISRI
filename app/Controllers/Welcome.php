<?php

namespace App\Controllers;

use TCPDF;
use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library
use Dompdf\Dompdf;
use Dompdf\Options;

class Welcome extends BaseController
{
  public function __construct()
  {
    $this->api = new Access_API();
    $this->db = \Config\Database::connect();
  }
  public function generate_password()
  {
    // set_time_limit(0);
    // ini_set('max_execution_time', '0');
    // ini_set('max_input_time', '0');
    // $data = $this->api->authorize("170441100045@student.trunojoyo.ac.id");
    // echo $data->code . '<br>';
    // echo $data->message . '<br>';
    // echo $data->data->ID . '<br>';
    $pass = 'password';
    echo password_hash($pass, PASSWORD_DEFAULT);
  }
  public function validasi_usulan_dosen()
  {
    $data = [
      'title' => 'Validasi Usulan Dosen',
      'db' => $this->db
    ];
    return view('Admin/Koorprodi/validasi_usulan_dosen', $data);
  }
  public function login_sisri()
  {
    $data = [
      'title' => 'Login Sisri',
      'db' => $this->db
    ];
    return view('Login/login_sisri', $data);
  }
  public function password()
  {
    $data = [
      'title' => 'Reset Password',
      'db' => $this->db
    ];
    return view('Login/password', $data);
  }
  public function beranda_koorprodi()
  {
    $data = [
      'title' => 'Beranda Koorprodi',
      'db' => $this->db
    ];
    return view('Korprodi/beranda_koorprodi', $data);
  }
  public function histori_sempro()
  {
    $data = [
      'title' => 'Histori Seminar Proposal',
      'db' => $this->db
    ];
    return view('Korprodi/Proposal/histori_sempro', $data);
  }
  public function daftar_nilai()
  {
    $data = [
      'title' => 'Daftar Nilai',
      'db' => $this->db
    ];
    return view('Korprodi/daftar_nilai', $data);
  }
  public function atur_jadwal()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Seminar Proposal',
      'db' => $this->db
    ];
    return view('Korprodi/Proposal/atur_jadwal_pendaftaran_seminar', $data);
  }
  public function atur_jadwal_seminar()
  {
    $data = [
      'title' => 'Jadwal Seminar Proposal',
      'db' => $this->db
    ];
    return view('Korprodi/Proposal/atur_pengujidan_jadwal_seminar', $data);
  }
  public function jadwal_pendaftaran_sidang()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Sidang',
      'db' => $this->db
    ];
    return view('Korprodi/Skripsi/atur_jadwal_pendaftaran', $data);
  }
  public function penjadwalan_sidang()
  {
    $data = [
      'title' => 'Penjadwalan Seminar dan Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Korprodi/penjadwalan_sidang', $data);
  }
  public function atur_jadwal_sidang()
  {
    $data = [
      'title' => 'Jadwal Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Korprodi/Skripsi/atur_jadwal_sidang_skripsi', $data);
  }
  public function manajemen_topik()
  {
    $data = [
      'title' => 'Manajemen Topik',
      'db' => $this->db
    ];
    return view('Korprodi/manajemen_topik', $data);
  }
  public function histori_sidang_skripsi()
  {
    $data = [
      'title' => 'Historu Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Korprodi/Skripsi/histori_sidang_skripsi', $data);
  }
  public function validasi_usulan()
  {
    $data = [
      'title' => 'Validasi Usulan',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/Validasi_Usulan', $data);
  }
  public function beranda()
  {
    $data = [
      'title' => 'Beranda Dosen',
      'db' => $this->db
    ];
    return view('Dosen/Beranda', $data);
  }
  public function validasi_bimbingan()
  {
    $data = [
      'title' => 'Validasi Bimbingan',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/validasi_bimbingan', $data);
  }
  public function bimbingan()
  {
    $data = [
      'title' => 'Validasi Bimbingan',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/bimbingan', $data);
  }
  public function persetujuan()
  {
    $data = [
      'title' => 'Persetujuan Daftar Seminar Proposal',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/persetujuan_daftar_seminar', $data);
  }
  public function berita_acara_seminar()
  {
    $data = [
      'title' => 'Berita Acara Seminar Proposal',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/berita_acara_seminar', $data);
  }
  public function validasi_revisi_pasca_seminar()
  {
    $data = [
      'title' => 'Validasi Revisi Pasca Seminar',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/validasi_revisi_pasca_seminar', $data);
  }
  public function histori_seminar()
  {
    $data = [
      'title' => 'Histori Seminar Proposal',
      'db' => $this->db
    ];
    return view('Dosen/Proposal/histori_seminar', $data);
  }
  public function validasi_bimbingan_skripsi()
  {
    $data = [
      'title' => 'Validasi Bimbingan Skripsi',
      'db' => $this->db
    ];
    return view('Dosen/Skripsi/validasi_bimbingan_skripsi', $data);
  }
  public function validasi_revisi_pasca_sidang()
  {
    $data = [
      'title' => 'Validasi Revisi Pasca Sidang',
      'db' => $this->db
    ];
    return view('Dosen/Skripsi/validasi_revisi_pasca_sidang', $data);
  }
  public function histori_sidang()
  {
    $data = [
      'title' => 'Histori Sidang',
      'db' => $this->db
    ];
    return view('Dosen/Skripsi/histori_sidang', $data);
  }
  public function berita_acara_sidang_skripsi()
  {
    $data = [
      'title' => 'Histori Sidang',
      'db' => $this->db
    ];
    return view('Dosen/Skripsi/berita_acara', $data);
  }
  public function input_nilai_skripsi()
  {
    $data = [
      'title' => 'Input Nilai Skrispi',
      'db' => $this->db
    ];
    return view('Dosen/input_nilai', $data);
  }
  public function Berita_Acara()
  {
    $data = [
      'title' => 'Berita Acara Seminar Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/Berita-Acara', $data);
  }
  public function berkas_proposal()
  {
    $data = [
      'title' => 'Berkas Seminar Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/berkas_proposal', $data);
  }
  public function berkas_sidang()
  {
    $data = [
      'title' => 'Berkas Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/Skripsi/berkas_sidang', $data);
  }
  public function ajukan_topik()
  {
    $data = [
      'title' => 'Ajukan Topik Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/ajukan_topik', $data);
  }
  public function bimbingan_proposal()
  {
    $data = [
      'title' => 'Bimbingan Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/bimbingan_proposal', $data);
  }
  public function Revisi_Pasca_Seminar()
  {
    $data = [
      'title' => 'Revisi Pasca Seminar Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/revisi_pasca_seminar', $data);
  }
  public function daftar_seminar()
  {
    $data = [
      'title' => 'Daftar Seminar Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/daftar_seminar', $data);
  }
  public function Bimbingan_Skripsi()
  {
    if (session()->get('ses_id') == '' && session()->get('ses_login') == '') {
      return redirect()->to('/');
    }

    $data = [
      'title' => 'Bimbingan Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/Skripsi/Bimbingan_Skripsi', $data);
  }
  public function Berita_Acara_Sidang()
  {
    $data = [
      'title' => 'Berita Acara Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/Skripsi/Berita_Acara_Sidang', $data);
  }
  public function Daftar_Sidang()
  {
    $data = [
      'title' => 'Daftar Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/Skripsi/Daftar_Sidang', $data);
  }
  public function Revisi_Pasca_Sidang()
  {
    $data = [
      'title' => 'Revisi Pasca Sidang Skripsi',
      'db' => $this->db
    ];
    return view('Mahasiswa/Skripsi/Revisi_Pasca_Sidang', $data);
  }
  public function beranda_mahasiswa()
  {
    $data = [
      'title' => 'Beranda Mahasiswa',
      'db' => $this->db
    ];
    return view('Mahasiswa/beranda_mahasiswa', $data);
  }
  public function profil()
  {
    $data = [
      'title' => 'Profil',
      'db' => $this->db
    ];
    return view('Profil/profil', $data);
  }
  public function edit_profil()
  {
    $data = [
      'title' => 'Edit Profil',
      'db' => $this->db
    ];
    return view('Profil/edit_profil', $data);
  }
  public function ganti_password()
  {
    $data = [
      'title' => 'Ganti Password',
      'db' => $this->db
    ];
    return view('Akun/ganti_password', $data);
  }
  public function data_koorprodi()
  {
    $data = [
      'title' => 'Data Koordinator Prodi',
      'db' => $this->db
    ];
    return view('Admin/data_koorprodi', $data);
  }
}
