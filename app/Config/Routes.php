<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// -----------------------------------------AUTH---------------------------------------
//Route Khusus Controller Auth-Login
$routes->add('/', 'Auth\Login::index');
$routes->add('/proses_login', 'Auth\Login::proses_login');
//Route Khusus Controller Auth-Logout
$routes->add('/logout', 'Auth\Logout::index');
// -----------------------------------------AKUN---------------------------------------
$routes->add('/profil', 'Akun\Profil::index');
$routes->add('/edit_profil', 'Akun\Edit_Profil::index');
$routes->add('/proses_edit_profil', 'Akun\Edit_Profil::proses');
$routes->add('/setting', 'Akun\Setting::index');
$routes->add('/update_pass', 'Akun\Setting::update_pass');
$routes->add('/update_universal_pass', 'Akun\Setting::update_universal_pass');
// ---------------------------------------ADMIN-------------------------------------------
//Route Khusus Controller Admin-Beranda
$routes->add('/beranda_admin', 'Admin\Beranda::index');
//Route Khusus Controller Admin-Mahasiswa
$routes->add('/data_mahasiswa', 'Admin\Mahasiswa::index');
$routes->add('/data_mahasiswa2', 'Admin\Mahasiswa::index2');
$routes->add('/update_data_mhs', 'Admin\Mahasiswa::update_data_mhs');
$routes->add('/jurusan_mhs/(:any)', 'Admin\Mahasiswa::jurusan_mhs/$1');
$routes->add('/prodi_mhs/(:any)', 'Admin\Mahasiswa::prodi_mhs/$1');
$routes->add('/detail_data_mhs/(:any)/(:any)', 'Admin\Mahasiswa::detail_data_mhs/$1/$2');
$routes->add('/angkatan_mhs/(:any)', 'Admin\Mahasiswa::angkatan_mhs/$1');
//Route Khusus Controller Admin-Dosen
$routes->add('/data_dosen', 'Admin\Dosen::index');
$routes->add('/update_data_dosen', 'Admin\Dosen::update_data_dosen');
$routes->add('/jurusan_dosen/(:any)', 'Admin\Dosen::jurusan_dosen/$1');
$routes->add('/prodi_dosen/(:any)', 'Admin\Dosen::prodi_dosen/$1');
$routes->add('/detail_data_dosen/(:any)', 'Admin\Dosen::detail_data_dosen/$1');
//Route Khusus Controller Admin-unit
$routes->add('/data_unit', 'Admin\Unit::index');
$routes->add('/update_data_unit', 'Admin\Unit::update_data_unit');
//Route Khusus Controller Admin-Periode
$routes->add('/data_periode', 'Admin\Periode::index');
$routes->add('/update_data_periode', 'Admin\Periode::update_data_periode');
//ROute Khusus Controller Admin-Koorprodi
$routes->add('/data_korprodi', 'Admin\Korprodi::index');
$routes->add('/add_korprodi', 'Admin\Korprodi::add');
$routes->add('/delete_korprodi', 'Admin\Korprodi::delete');
// -------------------------------------MAHASISWA-----------------------------------------
//Route Khusus Controller Mahasiswa-Beranda
$routes->add('/beranda_mahasiswa', 'Mahasiswa\Beranda::index');
//Route Khusus Controller Mahasiswa-Ajukan_Topik
$routes->add('/ajukan_topik_mahasiswa', 'Mahasiswa\Ajukan_Topik::index');
$routes->add('/ajukan_dospem_1', 'Mahasiswa\Ajukan_Topik::ajukan_dospem_1');
$routes->add('/ajukan_dospem_2', 'Mahasiswa\Ajukan_Topik::ajukan_dospem_2');
$routes->add('/proses_ajukan_topik', 'Mahasiswa\Ajukan_Topik::proses_ajukan_topik');
//Route Khusus Controller Mahasiswa-Bimbingan Proposal
$routes->add('/bimbingan_proposal/(:any)', 'Mahasiswa\Proposal\Bimbingan::index/$1');
$routes->add('/tambah_bimbingan_proposal', 'Mahasiswa\Proposal\Bimbingan::tambah');
$routes->add('/hapus_bimbingan', 'Mahasiswa\Proposal\Bimbingan::hapus');
$routes->add('/download_berkas_bimbingan', 'Mahasiswa\Proposal\Bimbingan::download_berkas');
//Route Khusus Controller Mahasiswa-DaftarSeminar
$routes->add('/daftar_seminar', 'Mahasiswa\Proposal\Daftar_Seminar::index');
$routes->add('/izin_seminar', 'Mahasiswa\Proposal\Daftar_Seminar::izin');
$routes->add('/mendaftar_seminar', 'Mahasiswa\Proposal\Daftar_Seminar::mendaftar');
//Route Khusus Controller Mahasiswa-Bimbingan Revisi Proposal
$routes->add('/bimbingan_revisi_proposal/(:any)', 'Mahasiswa\Proposal\Revisi::index/$1');
$routes->add('/tambah_bimbingan_revisi_proposal', 'Mahasiswa\Proposal\Revisi::tambah');
$routes->add('/hapus_bimbingan_revisi_proposal', 'Mahasiswa\Proposal\Revisi::hapus');
//Route Khusus Controller Mahasiswa-Bimbingan Skripsi
$routes->add('/bimbingan_skripsi/(:any)', 'Mahasiswa\Skripsi\Bimbingan::index/$1');
$routes->add('/tambah_bimbingan_skripsi', 'Mahasiswa\Skripsi\Bimbingan::tambah');
$routes->add('/hapus_bimbingan_skripsi', 'Mahasiswa\Skripsi\Bimbingan::hapus');
//Route Khusus Controller Mahasiswa-Bimbingan Revisi Proposal
$routes->add('/bimbingan_revisi_skripsi/(:any)', 'Mahasiswa\Skripsi\Revisi::index/$1');
$routes->add('/tambah_bimbingan_revisi_skripsi', 'Mahasiswa\Skripsi\Revisi::tambah');
$routes->add('/hapus_bimbingan_revisi_skripsi', 'Mahasiswa\Skripsi\Revisi::hapus');
//Route Khusus Controller Mahasiswa-DaftarSidangSkripsi
$routes->add('/daftar_sidang', 'Mahasiswa\Skripsi\Daftar_Sidang::index');
$routes->add('/izin_sidang', 'Mahasiswa\Skripsi\Daftar_Sidang::izin');
$routes->add('/mendaftar_sidang', 'Mahasiswa\Skripsi\Daftar_Sidang::mendaftar');
// --------------------------------------DOSEN-------------------------------------------
//Route Khusus Controller Dosen-Beranda
$routes->add('/beranda_dosen', 'Dosen\Beranda::index');
//Route Khusus Controller Dosen-Proposal-Validasi_Usulan
$routes->add('/validasi_usulan', 'Dosen\Proposal\Validasi_Usulan::index');
$routes->add('/setujui_validasi_usulan/(:any)', 'Dosen\Proposal\Validasi_Usulan::setujui_validasi/$1');
$routes->add('/tolak_validasi_usulan', 'Dosen\Proposal\Validasi_Usulan::tolak_validasi');
$routes->get('/download_proposal/(:any)', 'Dosen\Proposal\Validasi_Usulan::download/$1');
//Route Khusus Controller Dosen-Bimbingan Proposal
$routes->add('/data_mahasiswa_bimbingan_proposal', 'Dosen\Proposal\Bimbingan::index');
$routes->add('/bimbingan_proposal_dosen/(:any)', 'Dosen\Proposal\Bimbingan::bimbingan_proposal_dosen/$1');
$routes->add('/hapus_bimbingan_dosen', 'Dosen\Proposal\Bimbingan::hapus');
$routes->add('/tambah_bimbingan_proposal_dosen', 'Dosen\Proposal\Bimbingan::tambah');
//Route Khusus Controller Dosen-Berita Acara
$routes->add('/berita_acara_seminar', 'Dosen\Proposal\Berita_Acara::index');
$routes->add('/tandatangani_proposal', 'Dosen\Proposal\Berita_Acara::ttd');
$routes->add('/berita_acara_skripsi', 'Dosen\Skripsi\Berita_Acara::index');
$routes->add('/tandatangani_skripsi', 'Dosen\Skripsi\Berita_Acara::ttd');
//Route Khusus Controller Dosen-Validasi Daftar Seminar
$routes->add('/validasi_daftar_seminar', 'Dosen\Proposal\Validasi_Daftar_Seminar::index');
$routes->add('/proses_validasi_daftar_seminar', 'Dosen\Proposal\Validasi_Daftar_Seminar::validasi');
//Route Khusus Controller Dosen-Bimbingan Revisi Proposal
$routes->add('/data_mahasiswa_bimbingan_revisi_proposal', 'Dosen\Proposal\Revisi::index');
$routes->add('/bimbingan_revisi_proposal_dosen/(:any)', 'Dosen\Proposal\Revisi::bimbingan_proposal_dosen/$1');
$routes->add('/hapus_bimbingan_revisi_proposal_dosen', 'Dosen\Proposal\Revisi::hapus');
$routes->add('/tambah_bimbingan_revisi_proposal_dosen', 'Dosen\Proposal\Revisi::tambah');
$routes->add('/acc_revisi_proposal_dosen', 'Dosen\Proposal\Revisi::acc');
//Route Khusus Controller Dosen-Bimbingan Skripsi
$routes->add('/data_mahasiswa_bimbingan_skripsi', 'Dosen\Skripsi\Bimbingan::index');
$routes->add('/bimbingan_skripsi_dosen/(:any)', 'Dosen\Skripsi\Bimbingan::bimbingan_skripsi_dosen/$1');
$routes->add('/hapus_bimbingan_skripsi_dosen', 'Dosen\Skripsi\Bimbingan::hapus');
$routes->add('/tambah_bimbingan_skripsi_dosen', 'Dosen\Skripsi\Bimbingan::tambah');
//Route Khusus Controller Dosen-Validasi Daftar Sidang
$routes->add('/validasi_daftar_sidang', 'Dosen\Skripsi\Validasi_Daftar_Sidang::index');
$routes->add('/proses_validasi_daftar_sidang', 'Dosen\Skripsi\Validasi_Daftar_Sidang::validasi');
//Route Khusus Controller Dosen-Bimbingan Revisi Skripsi
$routes->add('/data_mahasiswa_bimbingan_revisi_skripsi', 'Dosen\Skripsi\Revisi::index');
$routes->add('/bimbingan_revisi_skripsi_dosen/(:any)', 'Dosen\Skripsi\Revisi::bimbingan_skripsi_dosen/$1');
$routes->add('/hapus_bimbingan_revisi_skripsi_dosen', 'Dosen\Skripsi\Revisi::hapus');
$routes->add('/tambah_bimbingan_revisi_skripsi_dosen', 'Dosen\Skripsi\Revisi::tambah');
$routes->add('/acc_revisi_skripsi_dosen', 'Dosen\Skripsi\Revisi::acc');
//Route Khusus Controller Dosen-Nilai
$routes->add('/input_nilai_bimbingan', 'Dosen\Nilai::index');
$routes->add('/save_nilai_bimbingan', 'Dosen\Nilai::save_nilai_bimbingan');
$routes->add('/input_nilai_skripsi', 'Dosen\Nilai::nilai_skripsi');
$routes->add('/save_nilai_skripsi', 'Dosen\Nilai::save_nilai_skripsi');
// --------------------------------------KORPRODI-------------------------------------------
//Route Khusus Controller Korprodi-Penjadwalan Sidang
$routes->add('/bidang_minat', 'Korprodi\Bidang_Minat::index');
$routes->add('/add_bidang_minat', 'Korprodi\Bidang_Minat::add');
$routes->add('/del_bidang_minat', 'Korprodi\Bidang_Minat::del');
$routes->add('/upd_bidang_minat', 'Korprodi\Bidang_Minat::upd');
//Route Khusus Controller Korprodi-Penjadwalan Sidang
$routes->add('/penjadwalan_sidang', 'Korprodi\Penjadwalan_Sidang::index');
$routes->add('/add_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::add');
$routes->add('/del_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::del');
$routes->add('/upd_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::upd');
$routes->add('/data_pendaftar', 'Korprodi\Penjadwalan_Sidang::data_pendaftar');
//Route Khusus Controller Dosen-Validasi Daftar Seminar
$routes->add('/validasi_daftar_seminar_koor', 'Korprodi\Validasi_Daftar_Seminar::index');
$routes->add('/proses_validasi_daftar_seminar_koor', 'Korprodi\Validasi_Daftar_Seminar::validasi');
// --------------------------------------CETAK-------------------------------------------
$routes->add('/cobaqr', 'Cetak::cobaqr');
$routes->add('/berkas_mhs_proposal', 'Cetak::berkas_mhs_proposal');
$routes->add('/berkas_mhs_skripsi', 'Cetak::berkas_mhs_skripsi');
$routes->get('/form_bimbingan_proposal/(:any)/(:any)', 'Cetak::form_bimbingan_proposal/$1/$2');
$routes->get('/berita_acara_proposal/(:any)', 'Cetak::berita_acara_proposal/$1');
$routes->get('/form_bimbingan_skripsi/(:any)/(:any)', 'Cetak::form_bimbingan_skripsi/$1/$2');
$routes->get('/berita_acara_skripsi/(:any)', 'Cetak::berita_acara_skripsi/$1');
// ============================================================================================


$routes->add('/Berita-Acara', 'Welcome::Berita_Acara');
$routes->add('/generate_password', 'Welcome::generate_password');
$routes->add('/generate_berita_acara', 'Welcome::generate_berita_acara');
$routes->add('/daftar_nilai', 'Welcome::daftar_nilai');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
