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
                        <h4 class="card-title mg-b-0">Data Koordinator Prodi</h4>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data Koordinator Prodi</p>
                    <div class="row">
                        <div class="col-xl-12">
                            <?= session()->getFlashdata('message'); ?>
                            <form action="<?php base_url() ?>/add_korprodi" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mt-4">
                                            <select class="form-control select2" name="idunit">
                                                <option label="Pilih Program Studi" selected disabled>Pilih Program Studi
                                                </option>
                                                <?php foreach ($prodi as $key) { ?>
                                                    <option value="<?= $key->idunit ?>">
                                                        <?= $key->fakultas . ' - ' . $key->jurusan . ' - Prodi ' . $key->namaunit ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mt-2">
                                            <select class="form-control select2" name="nip">
                                                <option label="Pilih Dosen" selected disabled>Pilih Kordinator Program Studi
                                                </option>
                                                <?php foreach ($dosen as $key) { ?>
                                                    <option value="<?= $key->nip ?>">
                                                        <?= $key->nip . ' - ' . $key->gelardepan . " " . $key->nama . ", " . $key->gelarbelakang ?>
                                                    </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-xl-2">
                                        <button type="submit" class="btn mt-2 btn-main-primary btn-block">Tambah</button>
                                    </div>
                                </div>
                            </form>
                            <hr />
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="validasitable1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>FAKULTAS</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>JURUSAN</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>PRODI</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Kordinator Prodi</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>AKSI</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $key) {
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $key->fakultas ?></td>
                                                <td><?= $key->jurusan ?></td>
                                                <td><?= $key->prodi ?></td>
                                                <td><?= $key->gelardepan . " " . $key->nama . ", " . $key->gelarbelakang ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="hidden" name="id_bimbingan" value="" />
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger btn-sm" data-bs-target="#modaldelete<?= $key->id_korprodi ?>" id="" data-bs-toggle="modal" href="#">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal" id="modaldelete<?= $key->id_korprodi ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <form action="<?php base_url() ?>/delete_korprodi" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_korprodi" value="<?= $key->id_korprodi ?>">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Hapus Data Koordinator Prodi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda Yakin Ingin Menghapus <b><?= $key->gelardepan . " " . $key->nama . ", " . $key->gelarbelakang ?></b> Sebagai Korprodi <b><?= $key->prodi ?></b> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn ripple btn-danger" type="submit">Hapus</button>
                                                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $no++;
                                        }
                                        ?>
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