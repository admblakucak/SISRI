<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Daftar Usulan Topik</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Daftar Usulan Topik dari Mahasiswa</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-body">
                            <div class="text-wrap">
                                <div class="example">
                                    <div class="panel panel-primary tabs-style-2">
                                        <div class="tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <ul class="nav panel-tabs main-nav-line">
                                                    <li><a href="#menunggu" class="nav-link active" data-bs-toggle="tab">Menunggu</a></li>
                                                    <li><a href="#diterima" class="nav-link" data-bs-toggle="tab">Diterima</a></li>
                                                    <li><a href="#ditolak" class="nav-link" data-bs-toggle="tab">Ditolak</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="menunggu">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable1">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>No. </span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 1</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 2</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="diterima">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>No. </span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 1</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 2</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="ditolak">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable3">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>No. </span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 1</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 2</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Forecasting</td>
                                                                            <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                                                            <td>Mohammad Syafik, S.Kom., M.Kom</td>
                                                                            <td>Ali, S.Kom., M.Kom</td>
                                                                            <td>
                                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">TERIMA</a>
                                                                                <a href="#" class="btn btn-sm btn-dark">TOLAK</a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>