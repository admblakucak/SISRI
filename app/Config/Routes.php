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

//Route Khusus Controller Auth-Login
$routes->add('/', 'Auth\Login::index');
$routes->add('/proses_login', 'Auth\Login::proses_login');
//Route Khusus Controller Auth-Logout
$routes->add('/logout', 'Auth\Logout::index');
//Route Khusus Controller Admin-Mahasiswa
$routes->add('/data_mahasiswa', 'Admin\Mahasiswa::index');
$routes->add('/data_mahasiswa2', 'Admin\Mahasiswa::index2');
$routes->add('/update_data_mhs/(:any)', 'Admin\Mahasiswa::update_data_mhs/$1');
$routes->add('/jurusan_mhs/(:any)', 'Admin\Mahasiswa::jurusan_mhs/$1');
$routes->add('/prodi_mhs/(:any)', 'Admin\Mahasiswa::prodi_mhs/$1');
$routes->add('/detail_data_mhs/(:any)/(:any)', 'Admin\Mahasiswa::detail_data_mhs/$1/$2');
$routes->add('/angkatan_mhs/(:any)', 'Admin\Mahasiswa::angkatan_mhs/$1');
//Route Khusus Controller Admin-Dosen
$routes->add('/data_dosen', 'Admin\Dosen::index');
$routes->add('/update_data_dosen/(:any)', 'Admin\Dosen::update_data_dosen/$1');
$routes->add('/jurusan_dosen/(:any)', 'Admin\Dosen::jurusan_dosen/$1');
$routes->add('/prodi_dosen/(:any)', 'Admin\Dosen::prodi_dosen/$1');
$routes->add('/detail_data_dosen/(:any)', 'Admin\Dosen::detail_data_dosen/$1');
//Route Khusus Controller Admin-unit
$routes->add('/data_unit', 'Admin\Unit::index');
$routes->add('/update_data_unit/(:any)', 'Admin\Unit::update_data_unit/$1');
//Route Khusus Controller Admin-Periode
$routes->add('/data_periode', 'Admin\Periode::index');
$routes->add('/update_data_periode/(:any)', 'Admin\Periode::update_data_periode/$1');
//Route Khusus Controller Admin-Perwalian
$routes->add('/data_perwalian', 'Admin\Perwalian::index');
$routes->add('/update_data_perwalian/(:any)', 'Admin\Perwalian::update_data_perwalian/$1');

// ============================================================================================

$routes->add('/validasi_usulan', 'Welcome::validasi_usulan');
// $routes->add('/proses_login', 'Welcome::proses_login');
$routes->add('/api', 'Welcome::api');
$routes->add('/Berita-Acara', 'Welcome::Berita_Acara');
$routes->add('/ajukan_topik', 'Welcome::ajukan_topik');
$routes->add('/bimbingan_proposal', 'Welcome::bimbingan_proposal');
$routes->add('/revisi_pasca_seminar', 'Welcome::revisi_pasca_seminar');
$routes->add('/daftar_seminar', 'Welcome::daftar_seminar');
$routes->add('/Bimbingan_Skripsi', 'Welcome::Bimbingan_Skripsi');
$routes->add('/Berita_Acara_Sidang', 'Welcome::Berita_Acara_Sidang');
$routes->add('/Daftar_Sidang', 'Welcome::Daftar_Sidang');
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
