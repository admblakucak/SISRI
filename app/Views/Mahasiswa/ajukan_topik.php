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
                        <h4 class="card-title mg-b-0">Ajukan Topik</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Ajukan topik skripsi<a href=""></a></p>
                </div>
                <div class="row mt-3">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12">
                            <div class="card box-shadow-10">
                                <div class="card-header">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nama Anda">
                                    </div>
                                    <div class="mb-4">
                                        <p class="mg-b-10">Pilih Topik </p>
                                        <select class="SlectBox form-control">
                                            <option value="volvo">- Pilih -</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Judul</label>
                                        <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Judul Skripsi Anda">
                                    </div>
                                    <div class="mb-4">
                                        <p class="mg-b-10">Pilih Calon Dosen Pembimbing 1</p>
                                        <select class="SlectBox form-control">
                                            <option value="volvo">- Pilih -</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <p class="mg-b-10">Pilih Calon Dosen Pembimbing 2</p>
                                        <select class="SlectBox form-control">
                                            <option value="volvo">- Pilih -</option>
                                        </select>
                                    </div>
                                    <p class="mg-b-20">Masukkan Proposal</p>
                                    <div class="row mt-3">
                                        <div class="col-sm-7 col-md-6 col-lg-4">
                                            <div class="input-group file-browser">
                                                <input type="text" class="form-control border-right-0 browse-file" placeholder="Upload Proposal Bab 1" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-default">
                                                        Browse <input type="file" class="d-none" multiple>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 mb-0">Upload</button>
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