<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-cl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="card-title mg-b-0">Daftar Nilai Ujian Skripsi</div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Daftar Nilai</p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Nim</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-2"><span>Nama</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Judul Skripsi</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai Dosen Pembimbing 1</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai Dosen Pembimbing 2</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai Dosen Penguji 1</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai Dosen Penguji 2</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai Dosen Penguji 3</span></th>
                                            <th style=" text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Nilai Akhir Angka</span></th>
                                            <th style=" text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Nilai Akhir Huruf</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_mhs as $key) {
                                            $mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim = '" . $key->id . "'")->getResult();
                                            $judul = $db->query("SELECT * FROM tb_pengajuan_topik WHERE nim = '" . $key->id . "'")->getResult();
                                            $nilai = $db->query("SELECT * FROM tb_mahasiswa WHERE nim = '" . $key->id . "'")->getResult();

                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $key->id ?></td>
                                                <td><?= $mhs[0]->nama ?></td>
                                                <td><?= $judul[0]->judul_topik ?></td>
                                                <td>80</td>
                                                <td>75</td>
                                                <td>85</td>
                                                <td>90</td>
                                                <td>95</td>
                                                <td>100</td>
                                                <td>A</td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>