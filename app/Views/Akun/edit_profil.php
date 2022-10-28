<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Edit Profil</div>
                <div class="table-responsive border-top userlist-table"></div>
                <div class="card-body text-center">
                    <div class="upload">
                        <img src="/assets/img/faces/6.jpg">
                        <div class="round">
                            <input type="file" id="" accept="image/*">
                            <i class="fa fa-camera profile-edi" style="color: #fff;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Detail Profil</div>
                <div class="table-responsive border-top userlist-table"></div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Isikan Nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="">Nim</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Isikan Nim Anda">
                        </div>
                        <div class="mb-3">
                            <label for="">Prodi</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="Isikan Prodi Anda">
                        </div>
                        <div class="mb-3">
                            <label for="">Angkatan</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Isikan Angkatan Anda">
                        </div>
                        <button class="btn btn-primary" type="button">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>