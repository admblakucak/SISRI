<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>Septian Dwi Hanggara</h4>
                            <p class="text-secondary mb-1">170441100020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nama</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Septian Dwi Hannggara
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nim</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            170441100020
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Program Studi</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Sistem Informasi
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Angkatan</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            2017
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>