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
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Validasi Revisi Pasca Seminar Proposal</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Validasi revisi proposal mahasiswa pasca seminar proposal</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Rincian Revisi</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>kata-kata yang typo di perbaikin</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <a href="#" class="btn btn-sm btn-primary">DOWNLOAD</a>
                                                <a class="btn btn-success btn-sm" data-bs-target="#modaladd" data-bs-toggle="modal" href="">REVISI</a>
                                                <a href="#" class="btn btn-sm btn-dark">DISETUJUI</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal" id="modaladd">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content modal-content-demo">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Validasi Revisi Proposal Pasca Seminar Proposal</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-4">
                                                <p class="mg-b-10">No</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Rincian Revisi</label>
                                                <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Nama Anda">
                                            </div>
                                            <div class="mb-4">
                                                <p class="mg-b-10">Status</p>
                                                <select class="SlectBox form-control">
                                                    <option value="volvo">- Pilih -</option>
                                                    <option value="volvo">Revisi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn ripple btn-primary" type="button">Kirim</button>
                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>