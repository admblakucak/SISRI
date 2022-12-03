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
                        <h4 class="card-title mg-b-0">Penjadwalan Sidang</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Mengatur jadwal pendaftaran Seminar Proposal dan Sidang Skripsi</p>
                    <div class="row mt-4">
                    </div>
                    <?= session()->getFlashdata('message') . "<br>"; ?>
                    <form action="<?php base_url() ?>/add_jadwal_sidang" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="idunit" value="<?= $idunit ?>">
                        <div class="form-group">
                            <label for="exampleInputPeriode">Periode</label>
                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang" name="periode">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTutup">Dibuka Pada</label>
                            <div class="row row-sm">
                                <div class="input-group col-md-12">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input name='open' class="form-control" id="datetimepicker1" type="text" placeholder="<?= date('d F Y H:i:s') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTutup">Tutup Pada</label>
                            <div class="row row-sm">
                                <div class="input-group col-md-12">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input name='expire' class="form-control" id="datetimepicker2" type="text" placeholder="<?= date('d F Y H:i:s') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJenis Sidang">Jenis Sidang</label>
                            <div class="row row-sm">
                                <select class="form-control select2" name="jenis_sidang">
                                    <option selected disabled> Pilih Sidang
                                    </option>
                                    <option value="seminar proposal">
                                        Seminar Proposal
                                    </option>
                                    <option value="sidang skripsi">
                                        Sidang Skripsi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">Tambah</button>
                    </form>
                </div>
                <div class="row mt-3"></div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Data Jadwal Sidang</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Daja jadwal seminar proposal dan sidang skripsi</a></p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Periode Sidang</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Dibuka Pada</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Ditutup Pada</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Jumlah Pendaftar</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Jenis Sidang</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        date_default_timezone_set("Asia/Jakarta");
                                        $no = 1;
                                        foreach ($data_jadwal as $key) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $key->periode ?></td>
                                                <td><?= $key->open ?></td>
                                                <td><?= $key->expire ?></td>
                                                <td>
                                                    <?php
                                                    $jumlah = $db->query("SELECT * FROM tb_pendaftar_sidang WHERE id_jadwal=" . $key->id_jadwal)->getResult();
                                                    echo $jumlah != NULL ? count($jumlah) : 0;
                                                    ?>
                                                </td>
                                                <td><?= $key->jenis_sidang ?></td>
                                                <td>
                                                    <?php
                                                    if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key->open))) {
                                                        echo "<a class='text-secondary'>Belum Dibuka</a>";
                                                    } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key->open))) {
                                                        echo "<a class='text-success'>Dibuka</a>";
                                                    } elseif (date('d F Y H:i:s') > date('d F Y H:i:s', strtotime($key->exspire))) {
                                                        echo "<a class='text-danger'>Ditutup</a>";
                                                    } ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="id_bimbingan" value="" />
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                                        <a class="btn btn-success btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="las la-check"></i></a>
                                                        <a class="btn btn-danger btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="las la-times"></i></a>
                                                    </div>
                                                </td>
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