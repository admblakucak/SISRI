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
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Daftar Usulan Topik</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Daftar Usulan Topik dari Mahasiswa</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Judul</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 1</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Dosen Pembimbing 2</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                            <div class="modal" id="modaladd">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Validasi Usulan Topik Mahasiswa</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <p class="mg-b-10">No</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nama Anda">
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Pilih Topik</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Judul</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Judul Anda">
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Status</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                    <option value="volvo">Terima</option>
                                                    <option value="volvo">Tolak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button">Terima</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
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
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Daftar Usulan Topik Mahasiswa</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Daftar usulan topik mahasiswa yang di terima</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                    <th style="text-align: center; vertical-align: middle;"><span>Nama</span></th>
                                    <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                    <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-5"><span>Judul</span></th>
                                    <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mahrus Sholeh</td>
                                    <td>Forecasting</td>
                                    <td>Sistem Peramalan Hasil Panen Bawang Merah Menggunakan Metode Backpropagatin Neural Network</td>
                                    <td>Dosen Pembimbing 1</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Ikromul Islam</td>
                                    <td>Analisa Sentimen</td>
                                    <td>Analisa Sentimen Perpindahan Ibu Kota</td>
                                    <td>Dosen Pembimbing 2</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Irwan</td>
                                    <td>Forecasting</td>
                                    <td>Sistem Peramalan Penjualan Udang Beku</td>
                                    <td>Dosen Pembimbing 2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>