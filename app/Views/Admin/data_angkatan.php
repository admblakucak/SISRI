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
                        <h4 class="card-title mg-b-0"><?= $tab ?></h4>

                        <?php
                        if ($tab == "Data Dosen") {
                            if ($count_data < $total_data) { ?>
                                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_dosen">UPDATE</a>
                            <?php }
                        } else {
                            if ($count_data < $total_data) { ?>
                                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_mhs">UPDATE</a>
                        <?php }
                        }
                        ?>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data angkatan, <?= session()->get('prodi') . ', ' . session()->get('jurusan') . ', ' . session()->get('fakultas') ?></a></p>
                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="validasitable1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Angkatan</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data as $key) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $key->namaperiode; ?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/detail_data_mhs/<?= session()->get('id_prodi') ?>/<?= $key->idperiode ?>">Data Mahasiswa</a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
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