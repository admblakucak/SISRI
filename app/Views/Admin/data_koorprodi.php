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
                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>FAKULTAS</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>PRODI</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>AKSI</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>TEKNIK</td>
                                            <td>SISTEM INFORMASI</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <input type="hidden" name="id_bimbingan" value="" />
                                                <div class="btn-group">
                                                    <a class="btn btn-primary btn-sm" data-bs-target="#modaladd" id="" data-bs-toggle="modal" href="#">CROD</a>
                                            </td>
                                            <div class="modal" id="modaladd">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Masukkan Data Koordinator Prodi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Pilih Fakultas</label>
                                                                <select class="form-control">
                                                                    <option label="Pilih Fakultas">
                                                                    </option>
                                                                    <option value="Teknik">
                                                                        Teknik
                                                                    </option>
                                                                    <option value="Pendidikan">
                                                                        Pendidikan
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Pilih Prodi</label>
                                                                <select class="form-control">
                                                                    <option label="Pilih Prodi">
                                                                    </option>
                                                                    <option value="Sistem Informasi">
                                                                        Sistem Informasi
                                                                    </option>
                                                                    <option value="Informatika">
                                                                        Teknik Informatika
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Pilih Dosen</label>
                                                                <select class="form-control">
                                                                    <option label="Pilih Dosen">
                                                                    </option>
                                                                    <option value="">
                                                                        Ach Dafid, ST., MT.
                                                                    </option>
                                                                    <option value="">
                                                                        Dr. Budi Dwi Satoto, S.Kom., MT
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-primary" type="submit">Simpan</button>
                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
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