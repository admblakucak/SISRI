<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-cl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="card-title mg-b-0">Input Nilai Skripsi</div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Menginputkan nilai skripsi mahasiswa</p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Nim</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-2"><span>Nama</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Judul Skripsi</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Status</span></th>
                                            <th style=" text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>170441100023</td>
                                            <td>Mahrus Sholeh</td>
                                            <td>Sistem Peramalan Hasil Panen Bawang Merah</td>
                                            <td>Sudah Melaksanakan Seminar Proposal</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">Nilai Sempro</a>
                                                <a href="#" class="btn btn-sm btn-dark" data-bs-target="#modaladd1" data-bs-toggle="modal">Nilai Sidang</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal" id="modaladd">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Menginputkan Nilai Seminar Proposal</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai Akhir Angka</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Nilai Angka">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai Akhir Huruf</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Nilai Huruf">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button">Simpan</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal" id="modaladd1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Menginputkan Nilai Sidang Skripsi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai Akhir Angka</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Nilai Angka">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nilai Akhir Huruf</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Nilai Huruf">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button">Simpan</button>
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
</div>

<?= $this->endSection(); ?>