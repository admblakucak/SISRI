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
      'title' => 'Validasi Usulan Dosen'
    ];
    return view('Admin/Koorprodi/validasi_usulan_dosen', $data);
  }
  public function login_sisri()
  {
    $data = [
      'title' => 'Login Sisri'
    ];
    return view('Login/login_sisri', $data);
  }
  public function password()
  {
    $data = [
      'title' => 'Reset Password'
    ];
    return view('Login/password', $data);
  }
  public function beranda_koorprodi()
  {
    $data = [
      'title' => 'Beranda Koorprodi'
    ];
    return view('Korprodi/beranda_koorprodi', $data);
  }
  public function histori_sempro()
  {
    $data = [
      'title' => 'Histori Seminar Proposal'
    ];
    return view('Korprodi/Proposal/histori_sempro', $data);
  }
  public function daftar_nilai()
  {
    $data = [
      'title' => 'Daftar Nilai'
    ];
    return view('Korprodi/daftar_nilai', $data);
  }
  public function atur_jadwal()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Seminar Proposal'
    ];
    return view('Korprodi/Proposal/atur_jadwal_pendaftaran_seminar', $data);
  }
  public function atur_jadwal_seminar()
  {
    $data = [
      'title' => 'Jadwal Seminar Proposal'
    ];
    return view('Korprodi/Proposal/atur_pengujidan_jadwal_seminar', $data);
  }
  public function jadwal_pendaftaran_sidang()
  {
    $data = [
      'title' => 'Jadwal Pendaftaran Sidang'
    ];
    return view('Korprodi/Skripsi/atur_jadwal_pendaftaran', $data);
  }
  public function penjadwalan_sidang()
  {
    $data = [
      'title' => 'Penjadwalan Seminar dan Sidang Skripsi'
    ];
    return view('Korprodi/penjadwalan_sidang', $data);
  }
  public function atur_jadwal_sidang()
  {
    $data = [
      'title' => 'Jadwal Sidang Skripsi'
    ];
    return view('Korprodi/Skripsi/atur_jadwal_sidang_skripsi', $data);
  }
  public function manajemen_topik()
  {
    $data = [
      'title' => 'Manajemen Topik'
    ];
    return view('Korprodi/manajemen_topik', $data);
  }
  public function histori_sidang_skripsi()
  {
    $data = [
      'title' => 'Historu Sidang Skripsi'
    ];
    return view('Korprodi/Skripsi/histori_sidang_skripsi', $data);
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
  public function bimbingan()
  {
    $data = [
      'title' => 'Validasi Bimbingan'
    ];
    return view('Dosen/Proposal/bimbingan', $data);
  }
  public function persetujuan()
  {
    $data = [
      'title' => 'Persetujuan Daftar Seminar Proposal'
    ];
    return view('Dosen/Proposal/persetujuan_daftar_seminar', $data);
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
      'title' => 'Berita Acara Seminar Proposal',
      'db' => $this->db
    ];
    return view('Mahasiswa/Proposal/Berita-Acara', $data);
  }
  public function template()
  {
    return view('template');
    // $option = new Options();
    // $option->set('is');
    $dompdf = new Dompdf();
    $filename = date('y-m-d-H-i-s');
    // load HTML content
    $data = [
      'baseurl' => base_url()
    ];
    $dompdf->loadHtml(view('template', $data));

    // (optional) setup the paper size and orientation
    $dompdf->setPaper('A4', 'potrait');

    // render html as PDF
    $dompdf->render();

    // output the generated pdf
    $dompdf->stream($filename, array('Attachment' => false));
  }
  public function template2($file)
  {
    header("Content-Type: application/octet-stream");

    $file = $file  . ".pdf";

    header("Content-Disposition: attachment; filename=" . urlencode($file));
    header("Content-Type: application/download");
    header("Content-Description: File Transfer");
    header("Content-Length: " . filesize($file));

    flush(); // This doesn't really matter.

    $fp = fopen($file, "r");
    while (!feof($fp)) {
      echo fread($fp, 65536);
      flush(); // This is essential for large downloads
    }

    fclose($fp);
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
    if (session()->get('ses_id') == '' && session()->get('ses_login') == '') {
      return redirect()->to('/');
    }

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
  public function profil()
  {
    $data = [
      'title' => 'Profil'
    ];
    return view('Profil/profil', $data);
  }
  public function edit_profil()
  {
    $data = [
      'title' => 'Edit Profil'
    ];
    return view('Profil/edit_profil', $data);
  }
  public function ganti_password()
  {
    $data = [
      'title' => 'Ganti Password'
    ];
    return view('Akun/ganti_password', $data);
  }
  public function data_koorprodi()
  {
    $data = [
      'title' => 'Data Koordinator Prodi'
    ];
    return view('Admin/data_koorprodi', $data);
  }
}
