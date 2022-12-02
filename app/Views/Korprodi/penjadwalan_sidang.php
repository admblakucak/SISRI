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
                    <p class="tx-12 tx-gray-500 mb-2">Mengatur jadwal pendaftaran seminar proposal dan Sidang Skripsi</p>
                    <div class="row mt-4">
                    </div>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="exampleInputPeriode">Periode</label>
                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTutup">Tutup Pada</label>
                            <div class="row row-sm">
                                <div class="input-group col-md-12">
                                    <div class="input-group-text">
                                        <div class="input-group-text">
                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                        </div>
                                    </div><input class="form-control" id="datetimepicker2" type="text" value="2022-12-20 21:05">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputJenis Sidang">Jenis Sidang</label>
                            <div class="row row-sm">
                                <select class="form-control select2">
                                    <option label="Search">
                                    </option>
                                    <option value="Seminar Proposal">
                                        Seminar Proposal
                                    </option>
                                    <option value="Sidang Skripsi">
                                        Sidang Skripsi
                                    </option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mt-3"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>