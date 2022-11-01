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
                        <h4 class="card-title mg-b-0">Persetujuan Daftar Seminar Proposal</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Permintaan izin mahasiswa untuk mendaftar seminar proposal</a></p>
                </div>
                <div class="col-xl-12 pt-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="tab-pane" id="pem2">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable2">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Nama</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 1</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 2</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Koordinator Prodi</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody id='show_data2'>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td scope="row">Septian Dwi Hanggara</td>
                                                        <td scope="row">Sistem Peramalan</td>
                                                        <td scope="row">Ach. Dafid<span class="text-success ms-3">Setuju</span></td>
                                                        <td scope="row">Khozaimi<span class="text-danger ms-3">Tolak</span></td>
                                                        <td scope="row">Budi Dwi Satoto<span class="text-success ms-3">Setuju</span></td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <input type="hidden" name="id_bimbingan" value="" />
                                                            <div class="btn-group">
                                                                <a class="btn btn-primary btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="fa fa-search"></i></a>
                                                                <a class="btn btn-success btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="las la-check"></i></a>
                                                                <a class="btn btn-danger btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#"><i class="las la-times"></i></a>
                                                        </td>
                                                        <div class="modal" id="modaldel2">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">Hapus Bimbingan</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form action="<?php base_url() ?>/hapus_bimbingan" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id_bimbingan" value="" />
                                                                        <div class="modal-body">
                                                                            Apakah anda yakin ingin mendaftar <b></b> ?
                                                                            <p class="mt-3"></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn ripple btn-primary" type="submit">Daftar</button>
                                                                            <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                                        </div>
                                                                    </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>