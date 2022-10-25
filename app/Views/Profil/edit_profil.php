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
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="/assets/img/faces/6.jpg" alt="">
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-primary" type="button" data-bs-target="#modaladd" data-bs-toggle="modal">Upload Gambar</button>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modaladd">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Upload Gambar</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="<?php base_url() ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Upload Gambar</label>
                                        <div class="input-group file-browser">
                                            <input type="text" class="form-control border-right-0 browse-file" placeholder="-" name="ket_berkas" readonly>
                                            <label class="input-group-btn">
                                                <span class="btn btn-default">
                                                    Browse <input type="file" name="berkas" class="d-none" accept="image/*" multiple>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="submit">Upload</button>
                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Detail Profil</div>
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