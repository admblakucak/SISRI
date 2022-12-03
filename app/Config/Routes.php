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
//Route Khusus Controller Dosen-Bimbingan Revisi Proposal
$routes->add('/data_mahasiswa_bimbingan_revisi_proposal', 'Dosen\Proposal\Revisi::index');
$routes->add('/bimbingan_revisi_proposal_dosen/(:any)', 'Dosen\Proposal\Revisi::bimbingan_proposal_dosen/$1');
$routes->add('/hapus_bimbingan_revisi_proposal_dosen', 'Dosen\Proposal\Revisi::hapus');
$routes->add('/tambah_bimbingan_revisi_proposal_dosen', 'Dosen\Proposal\Revisi::tambah');
//Route Khusus Controller Dosen-Bimbingan Skripsi
$routes->add('/data_mahasiswa_bimbingan_skripsi', 'Dosen\Skripsi\Bimbingan::index');
$routes->add('/bimbingan_skripsi_dosen/(:any)', 'Dosen\Skripsi\Bimbingan::bimbingan_skripsi_dosen/$1');
$routes->add('/hapus_bimbingan_skripsi_dosen', 'Dosen\Skripsi\Bimbingan::hapus');
$routes->add('/tambah_bimbingan_skripsi_dosen', 'Dosen\Skripsi\Bimbingan::tambah');
//Route Khusus Controller Dosen-Bimbingan Revisi Skripsi
$routes->add('/data_mahasiswa_bimbingan_revisi_skripsi', 'Dosen\Skripsi\Revisi::index');
$routes->add('/bimbingan_revisi_skripsi_dosen/(:any)', 'Dosen\Skripsi\Revisi::bimbingan_skripsi_dosen/$1');
$routes->add('/hapus_bimbingan_revisi_skripsi_dosen', 'Dosen\Skripsi\Revisi::hapus');
$routes->add('/tambah_bimbingan_revisi_skripsi_dosen', 'Dosen\Skripsi\Revisi::tambah');
// --------------------------------------KORPRODI-------------------------------------------
//Route Khusus Controller Korprodi-Beranda
$routes->add('/beranda_korprodi', 'Korprodi\Beranda::index');
//Route Khusus Controller Korprodi-Penjadwalan Sidang
$routes->add('/penjadwalan_sidang', 'Korprodi\Penjadwalan_Sidang::index');
$routes->add('/add_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::add');
$routes->add('/del_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::del');
$routes->add('/upd_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::upd');
$routes->add('/data_pendaftar', 'Korprodi\Penjadwalan_Sidang::data_pendaftar');
$routes->add('/setting_jadwal_sidang', 'Korprodi\Penjadwalan_Sidang::setting_jadwal_sidang');
// ============================================================================================

$routes->add('/coba', 'Welcome::coba');
$routes->add('/Berita-Acara', 'Welcome::Berita_Acara');
$routes->add('/ajukan_topik', 'Welcome::ajukan_topik');
$routes->add('/revisi_pasca_seminar', 'Welcome::revisi_pasca_seminar');
$routes->add('/Bimbingan_Skripsi', 'Welcome::Bimbingan_Skripsi');
$routes->add('/Berita_Acara_Sidang', 'Welcome::Berita_Acara_Sidang');
$routes->add('/Revisi_Pasca_Sidang', 'Welcome::Revisi_Pasca_Sidang');
$routes->add('/validasi_bimbingan', 'Welcome::validasi_bimbingan');
$routes->add('/berita_acara_seminar', 'Welcome::berita_acara_seminar');
$routes->add('/validasi_revisi_pasca_seminar', 'Welcome::validasi_revisi_pasca_seminar');
$routes->add('/histori_seminar', 'Welcome::histori_seminar');
$routes->add('/validasi_bimbingan_skripsi', 'Welcome::validasi_bimbingan_skripsi');
$routes->add('/validasi_revisi_pasca_sidang', 'Welcome::validasi_revisi_pasca_sidang');
$routes->add('/validasi_usulan_dosen', 'Welcome::validasi_usulan_dosen');
$routes->add('/daftar_nilai', 'Welcome::daftar_nilai');
$routes->add('/input_nilai', 'Welcome::input_nilai_skripsi');
$routes->add('/histori_sidang', 'Welcome::histori_sidang');
$routes->add('/berita_acara', 'Welcome::berita_acara_sidang_skripsi');
$routes->add('/atur_jadwal_pendaftaran_seminar', 'Welcome::atur_jadwal');
$routes->add('/atur_pengujidan_jadwal_seminar', 'Welcome::atur_jadwal_seminar');
$routes->add('/histori_sempro', 'Welcome::histori_sempro');
$routes->add('/atur_jadwal_pendaftaran', 'Welcome::jadwal_pendaftaran_sidang');
$routes->add('/atur_jadwal_sidang_skripsi', 'Welcome::atur_jadwal_sidang');
$routes->add('/histori_sidang_skripsi', 'Welcome::histori_sidang_skripsi');
$routes->add('/Beranda', 'Welcome::beranda');
$routes->add('/beranda_mahasiswa', 'Welcome::beranda_mahasiswa');
$routes->add('/beranda_koorprodi', 'Welcome::beranda_koorprodi');
$routes->add('/login_sisri', 'Welcome::login_sisri');
$routes->add('/password', 'Welcome::password');
$routes->add('/bimbingan', 'Welcome::bimbingan');
$routes->add('/persetujuan_daftar_seminar', 'Welcome::persetujuan');
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
