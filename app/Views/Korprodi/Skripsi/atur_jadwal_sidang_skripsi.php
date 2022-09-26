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
                        <h4 class="card-title mg-b-0">Jadwal Sidang Skripsi</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Mengatur jadwal sidang skripsi</p>
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card  box-shadow-10">
                                <div class="card-header">
                                    <div class="card-body pt-0">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nama Anda">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nim</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nim Anda">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Judul Skripsi</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Judul Anda">
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Dosen Pembimbing 1</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Dosen Pembimbing 2</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Dosen Penguji 1</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Dosen Penguji 2</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Dosen Penguji 3</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Hari</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-th"></span>
                                                            </div>
                                                            <input placeholder="masukkan tanggal" type="date" class="form-control datepicker" name="tgl_awal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jam Awal</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-th"></span>
                                                            </div>
                                                            <input placeholder="masukkan tanggal" type="time" class="form-control datepicker" name="tgl_awal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Jam Akhir</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <span class="glyphicon glyphicon-th"></span>
                                                            </div>
                                                            <input placeholder="masukkan tanggal" type="time" class="form-control datepicker" name="tgl_awal">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Ruang</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                        </form>
                                        <button type="submit" class="btn btn-primary mt-3 mb-0">Simpan</button>
                                    </div>
                                </div>
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