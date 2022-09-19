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
                        <div class="card-title mg-b-0">Berita Acara Seminar Proposal</div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Berita acara seminar proposal mahasiswa</p>
                    <div class="row mt-5">
                        <div class="col-sm-7 col-md-6 col-lg-4">
                            <div class="input-group file-browser">
                                <input type="text" class="form-control border-right-0 browse-file" placeholder="Pilih Dokumen" readonly>
                                <label class="input-group-btn">
                                    <span class="btn btn-default">
                                        Browse <input type="file" class="d-none" multiple>
                                    </span>
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-primary" type="button">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-3"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>