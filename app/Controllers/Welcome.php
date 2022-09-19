<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Libraries\Access_API; // Import library

class Welcome extends BaseController
{
  public function index()
  {
    session()->destroy();
    return view('Login/login');
  }
  public function proses_login()
  {
    $username = $this->request->getPost("username");
    $pass = $this->request->getPost("password");
    if ($username == 'mahasiswa' && $pass == 'mahasiswa') {
      session()->set('ses_login', 'mahasiswa');
      session()->set('ses_nama', 'Mahrus Sholeh');
      session()->set('ses_id', '170441100001');
      return redirect()->to('/beranda_mahasiswa');
    } elseif ($username == 'dosen' && $pass == 'dosen') {
      session()->set('ses_login', 'dosen');
      session()->set('ses_nama', 'Yeni Kustiyahningsih, S.Kom., M.Kom');
      session()->set('ses_id', '19770921 200812 2 002');
      return redirect()->to('/Beranda');
    } elseif ($username == 'korprodi' && $pass == 'korprodi') {
      session()->set('ses_login', 'korprodi');
      session()->set('ses_nama', 'Budi Dwi Satoto, S.T., M.Kom');
      session()->set('ses_id', '19750909 200212 1 001');
      return redirect()->to('/beranda_koorprodi');
      return redirect()->to('/validasi_usulan');
    } elseif ($username == 'admin' && $pass == 'admin') {
      session()->set('ses_login', 'admin');
      session()->set('ses_nama', 'Budi Dwi Satoto, S.T., M.Kom');
      session()->set('ses_id', '19750909 200212 1 001');
      return redirect()->to('/data_dosen');
    } else {
      return redirect()->to('/');
    }
  }
  public function validasi_usulan_dosen()
  {
    $data = [
      'title' => 'Validasi Usulan Dosen'
    ];
    return view('Admin/Koorprodi/validasi_usulan_dosen', $data);
  }
  public function beranda_koorprodi()
  {
    $data = [
      'title' => 'Beranda Koorprodi'
    ];
    return view('Admin/Koorprodi/beranda_koorprodi', $data);
  }
  public function histori_sempro()
  {
    $data = [
      'title' => 'Histori Seminar Proposal'
    ];
    return view('Admin/Koorprodi/Proposal/histori_sempro', $data);
  }
  public function daftar_nilai()
  {
    $data = [
      'title' => 'Daftar Nilai'
    ];
    return view('Admin/Koorprodi/daftar_nilai', $data);
  }
  public function atur_jadwal()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Seminar Proposal'
    ];
    return view('Admin/Koorprodi/Proposal/atur_jadwal_pendaftaran_seminar', $data);
  }
  public function atur_jadwal_seminar()
  {
    $data = [
      'title' => 'Jadwal Seminar Proposal'
    ];
    return view('Admin/Koorprodi/Proposal/atur_pengujidan_jadwal_seminar', $data);
  }
  public function jadwal_pendaftaran_sidang()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Sidang'
    ];
    return view('Admin/Koorprodi/Skripsi/atur_jadwal_pendaftaran', $data);
  }
  public function atur_jadwal_sidang()
  {
    $data = [
      'title' => 'Jadwal Sidang Skripsi'
    ];
    return view('Admin/Koorprodi/Skripsi/atur_jadwal_sidang_skripsi', $data);
  }
  public function histori_sidang_skripsi()
  {
    $data = [
      'title' => 'Historu Sidang Skripsi'
    ];
    return view('Admin/Koorprodi/Skripsi/histori_sidang_skripsi', $data);
  }
  public function validasi_usulan()
  {
    $data = [
      'title' => 'Validasi Usulan'
    ];
    return view('Dosen/Proposal/Validasi_Usulan', $data);
  }
  public function beranda()
  {
    $data = [
      'title' => 'Beranda Dosen'
    ];
    return view('Dosen/Beranda', $data);
  }
  public function validasi_bimbingan()
  {
    $data = [
      'title' => 'Validasi Bimbingan'
    ];
    return view('Dosen/Proposal/validasi_bimbingan', $data);
  }
  public function berita_acara_seminar()
  {
    $data = [
      'title' => 'Berita Acara Seminar Proposal'
    ];
    return view('Dosen/Proposal/berita_acara_seminar', $data);
  }
  public function validasi_revisi_pasca_seminar()
  {
    $data = [
      'title' => 'Validasi Revisi Pasca Seminar'
    ];
    return view('Dosen/Proposal/validasi_revisi_pasca_seminar', $data);
  }
  public function histori_seminar()
  {
    $data = [
      'title' => 'Histori Seminar Proposal'
    ];
    return view('Dosen/Proposal/histori_seminar', $data);
  }
  public function validasi_bimbingan_skripsi()
  {
    $data = [
      'title' => 'Validasi Bimbingan Skripsi'
    ];
    return view('Dosen/Skripsi/validasi_bimbingan_skripsi', $data);
  }
  public function validasi_revisi_pasca_sidang()
  {
    $data = [
      'title' => 'Validasi Revisi Pasca Sidang'
    ];
    return view('Dosen/Skripsi/validasi_revisi_pasca_sidang', $data);
  }
  public function histori_sidang()
  {
    $data = [
      'title' => 'Histori Sidang'
    ];
    return view('Dosen/Skripsi/histori_sidang', $data);
  }
  public function berita_acara_sidang_skripsi()
  {
    $data = [
      'title' => 'Histori Sidang'
    ];
    return view('Dosen/Skripsi/berita_acara', $data);
  }
  public function input_nilai_skripsi()
  {
    $data = [
      'title' => 'Input Nilai Skrispi'
    ];
    return view('Dosen/input_nilai', $data);
  }
  public function Berita_Acara()
  {
    $data = [
      'title' => 'Berita Acara Seminar Proposal'
    ];
    return view('Mahasiswa/Proposal/Berita-Acara', $data);
  }
  public function ajukan_topik()
  {
    $data = [
      'title' => 'Ajukan Topik Skripsi'
    ];
    return view('Mahasiswa/ajukan_topik', $data);
  }
  public function bimbingan_proposal()
  {
    $data = [
      'title' => 'Bimbingan Proposal'
    ];
    return view('Mahasiswa/Proposal/bimbingan_proposal', $data);
  }
  public function Revisi_Pasca_Seminar()
  {
    $data = [
      'title' => 'Revisi Pasca Seminar Proposal'
    ];
    return view('Mahasiswa/Proposal/revisi_pasca_seminar', $data);
  }
  public function daftar_seminar()
  {
    $data = [
      'title' => 'Daftar Seminar Proposal'
    ];
    return view('Mahasiswa/Proposal/daftar_seminar', $data);
  }
  public function Bimbingan_Skripsi()
  {
    $data = [
      'title' => 'Bimbingan Skripsi'
    ];
    return view('Mahasiswa/Skripsi/Bimbingan_Skripsi', $data);
  }
  public function Berita_Acara_Sidang()
  {
    $data = [
      'title' => 'Berita Acara Sidang Skripsi'
    ];
    return view('Mahasiswa/Skripsi/Berita_Acara_Sidang', $data);
  }
  public function Daftar_Sidang()
  {
    $data = [
      'title' => 'Daftar Sidang Skripsi'
    ];
    return view('Mahasiswa/Skripsi/Daftar_Sidang', $data);
  }
  public function Revisi_Pasca_Sidang()
  {
    $data = [
      'title' => 'Revisi Pasca Sidang Skripsi'
    ];
    return view('Mahasiswa/Skripsi/Revisi_Pasca_Sidang', $data);
  }
  public function beranda_mahasiswa()
  {
    $data = [
      'title' => 'Beranda Mahasiswa'
    ];
    return view('Mahasiswa/beranda_mahasiswa', $data);
  }
}
