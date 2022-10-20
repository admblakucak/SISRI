<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Validasi Bimbingan</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Validasi Bimbingan Proposal Mahasiswa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th class="wd-lg-8p"><span>Foto</span></th>
                                    <th class="wd-lg-20p"><span>Nim</span></th>
                                    <th class="wd-lg-20p"><span>Nama</span></th>
                                    <th class="wd-lg-20p"><span>Prodi</span></th>
                                    <th class="wd-lg-20p">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md me-2" src="../../assets/img/faces/1.jpg">
                                    </td>
                                    <td>
                                        170441100020
                                    </td>
                                    <td>
                                        Septian Dwi Hanggara
                                    </td>
                                    <td>
                                        Sistem Informasi
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination mt-4 mb-0 float-end flex-wrap">
                        <li class="page-item page-prev disabled">
                            <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item page-next">
                            <a class="page-link" href="#">Selanjutnya</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>