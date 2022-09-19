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
                                <h4 class="card-title mg-b-0">Bimbingan Skripsi Mahasiswa</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Bimbingan Skripsi kepada Dosen Pembimbing</a></p>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <a class="btn btn-primary btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">Upload Dokumen</a>
                        </div>
                        <div class="modal" id="modaladd">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="modal-header">
                                        <h6 class="modal-title">Masukkan Dokumen Bimbingan Skripsi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group file-browser">
                                            <input type="text" class="form-control border-right-0 browse-file" placeholder="Pilih Dokumen" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-default">
                                                    Browse <input type="file" class="d-none" multiple>
                                                </span>
                                            </label>
                                        </div>
                                        <p class="mt-3">Silahkan masukkan dokumen bimbingan skripsi dan tunggu konfirmasi dari dosen pembimbing anda</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary" type="button">Upload</button>
                                        <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h4 class="card-title mg-b-0">Daftar Revisi</h4>
                            <p class="tx-12 tx-gray-500 mb-2">Daftar Revisi Dari Dosen Pembimbing</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Rincian Revisi</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Bab 1 Pragraf Pertama</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>tabel 2.1 di rubah</td>
                                            <td style="text-align: center; vertical-align: middle;">Revisi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>