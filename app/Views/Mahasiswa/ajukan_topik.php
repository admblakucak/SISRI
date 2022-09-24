<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid mt-3">

    <!-- row opened-->

    <div class="card custom-card">
        <div class="row row-sm row-deck">
            <div class="col-lg-12 col-md-12">
                <div class="card-body ht-100p">
                    <div>
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Ajukan Topik</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Ajukan topik skripsi.</a></p>
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <select class="form-control select2" name="topik">
                                <option selected disabled>Pilih Topik
                                </option>
                                <?php foreach ($topik as $key) { ?>
                                    <option value="<?= $key->idtopik ?>">
                                        <?= $key->nama ?>
                                    </option>
                                <?php
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="teks" name="judul_topik" class="form-control" id="exampleInput" placeholder="Isikan Judul Skripsi Anda">
                        </div>
                        <div class="row">
                            <div class="col-sm-7 col-md-6 col-lg-4">
                                <div class="input-group file-browser">
                                    <input type="text" class="form-control border-right-0 browse-file" placeholder="Upload Proposal Minimal Bab 1" readonly>
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
    <div class="row row-sm row-deck">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-body ht-100p">
                    <div>
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Ajukan Pembimbing 1</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Anda tidak dapat mengajukan dosen pembimbing 1 berulang kali kecuali pengajuan telah ditolak.</p>
                        <?= session()->getFlashdata('message_pem1'); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-9">
                                    <form action="<?php base_url() ?>/ajukan_dospem_1" method="POST" enctype="multipart/form-data">
                                        <div class="mt-2">
                                            <select class="form-control select2" name="nip">
                                                <option label="Pilih Pembimbing 1" selected disabled>Pilih Pembimbing 1
                                                </option>
                                                <?php foreach ($dosen as $key1) { ?>
                                                    <option value="<?= $key1->nip ?>">
                                                        <?= $key1->namaunit . ' - ' . $key1->gelardepan . ' ' . $key1->nama . ', ' . $key1->gelarbelakang ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn mt-2 btn-main-primary btn-block <?php if ($ststbl1 > 0) {
                                                                                                            echo " disabled";
                                                                                                        } ?>">Ajukan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="list-group list-lg-group list-group-flush">
                            <?php foreach ($pengajuan_pem1 as $pem1) { ?>
                                <div class="list-group-item list-group-item-action br-t-1" href="#">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-0">
                                                    <h5 class="mb-1 tx-15"><?= $pem1->gelardepan . ' ' . $pem1->nama . ', ' . $pem1->gelarbelakang ?></h5>
                                                    <p class="mb-0 tx-13 text-muted"><?= $pem1->namaunit ?></p>
                                                </div>
                                                <span class="ms-auto fs-16 mt-2">
                                                    <?php if ($pem1->status_pengajuan == 'diterima') { ?>
                                                        <span class="text-success ms-2">Diterima</span>
                                                    <?php
                                                    } elseif ($pem1->status_pengajuan == 'menunggu') { ?>
                                                        <span class="text-warning ms-2">Menunggu</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="text-danger ms-2">Ditolak</span>
                                                    <?php
                                                    } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-body ht-100p">
                    <div>
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Ajukan Pembimbing 2</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Anda tidak dapat mengajukan dosen pembimbing 2 berulang kali kecuali pengajuan telah ditolak.</p>
                        <?= session()->getFlashdata('message_pem2'); ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-9">
                                    <form action="<?php base_url() ?>/ajukan_dospem_2" method="POST" enctype="multipart/form-data">
                                        <div class="mt-2">
                                            <select class="form-control select2" name="nip">
                                                <option label="Pilih Pembimbing 1" selected disabled>Pilih Pembimbing 2
                                                </option>
                                                <?php foreach ($dosen as $key2) { ?>
                                                    <option value="<?= $key2->nip ?>">
                                                        <?= $key2->namaunit . ' - ' . $key2->gelardepan . ' ' . $key2->nama . ', ' . $key2->gelarbelakang ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn mt-2 btn-main-primary btn-block <?php if ($ststbl2 > 0) {
                                                                                                            echo " disabled";
                                                                                                        } ?>">Ajukan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="list-group list-lg-group list-group-flush">
                            <?php foreach ($pengajuan_pem2 as $pem2) { ?>
                                <div class="list-group-item list-group-item-action br-t-1" href="#">
                                    <div class="media mt-0">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-0">
                                                    <h5 class="mb-1 tx-15"><?= $pem2->gelardepan . ' ' . $pem2->nama . ', ' . $pem2->gelarbelakang ?></h5>
                                                    <p class="mb-0 tx-13 text-muted"><?= $pem2->namaunit ?></p>
                                                </div>
                                                <span class="ms-auto fs-16 mt-2">
                                                    <?php if ($pem2->status_pengajuan == 'diterima') { ?>
                                                        <span class="text-success ms-2">Diterima</span>
                                                    <?php
                                                    } elseif ($pem2->status_pengajuan == 'menunggu') { ?>
                                                        <span class="text-warning ms-2">Menunggu</span>
                                                    <?php
                                                    } else { ?>
                                                        <span class="text-danger ms-2">Ditolak</span>
                                                    <?php
                                                    } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>