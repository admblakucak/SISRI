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
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Daftar Seminar Proposal</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Silahkan Mengisi Form Pendaftaran Seminar Proposal</a></p>
                </div>
                <div class="row mt-3">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12">
                            <div class="card box-shadow-10">
                                <div class="card-header">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInput" placeholder="Isikan Email Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nama Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nim</label>
                                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nim Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No WhatsApp</label>
                                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nomor WhatsApp Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Skripsi</label>
                                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan judul Skripsi Anda">
                                        </div>
                                        <div class="mb-4">
                                            <p class="mg-b-10">Pilih Dosen Pembimbing 1</p>
                                            <select class="SlectBox form-control">
                                                <option value="volvo">- Pilih -</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <p class="mg-b-10">Pilih Dosen Pembimbing 2</p>
                                            <select class="SlectBox form-control">
                                                <option value="volvo">- Pilih -</option>
                                            </select>
                                        </div>
                                    </form>
                                    <p class="mg-b-10">File Proposal dan Dokumen Pendaftaran Seminar Proposal</p>
                                    <p class="tx-12 tx-gray-500 mb-2">(F.S.JMF.01-F.S.JMF.04, KRS Terakhir, Transkip Sementara. Semua file dijdikan satu dokumen PDF)</a></p>
                                    <div class="row mt-3">
                                        <div class="col-sm-7 col-md-6 col-lg-4">
                                            <div class="input-group file-browser">
                                                <input type="text" class="form-control border-right-0 browse-file" placeholder="Pilih File" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-default">
                                                        Browse <input type="file" class="d-none" multiple>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <p class="mg-b-10">File Proposal Skripsi Acc Dosen Pembimbing</p>
                                    <div class="row mt-3">
                                        <div class="col-sm-7 col-md-6 col-lg-4">
                                            <div class="input-group file-browser">
                                                <input type="text" class="form-control border-right-0 browse-file" placeholder="Pilih File" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-default">
                                                        Browse <input type="file" class="d-none" multiple>
                                                    </span>
                                                </label>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-primary mt-3 mb-0">Upload</button>
                                            <button type="download" class="btn btn-primary mt-3 mb-0">Download File</button>
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