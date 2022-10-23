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
                                <h4 class="card-title mg-b-0">Validasi Bimbingan</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Validasi Bimbingan Proposal dari Mahasiswa</a></p>
                    </div>
                    <div class="row row-sm main-content-app mb-4">
                        <div class="card col-xl-3 col-lg-4">
                            <div class="main-content-left mt-2">
                                <div class="card-body p-0 customers mt-1">
                                    <div class="list-group list-lg-group list-group-flush">
                                        <div class="list-group-item list-group-item-action br-t-1">
                                            <div class="media mt-0">
                                                <div class="media-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="mt-0">
                                                            <h5 class="mb-1 tx-15">
                                                            </h5>
                                                            <p class="mb-0 tx-13 text-muted"></p>
                                                        </div>
                                                        <span class="text-danger ms-2">Belum Dibaca</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="main-content-body main-content-body">
                                <div class="table-responsive pe-2 ps-2 pt-2">
                                    <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Pokok Bimbingan</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Dari</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Waktu</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                            </tr>
                                        </thead>
                                        <tbody id='show_data'>
                                            <tr>
                                                <th scope="row"></th>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td scope="row"></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="hidden" name="id_bimbingan" value="" />
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary btn-sm" data-bs-target="#modalket" id="rivisi" data-bs-toggle="modal" href="#"><i class="las la-plus">Revisi</i></a>
                                                    </div>
                                                    <a class="btn btn-primary btn-sm item_revisi" id="" data="" href="#"><i class="far fa-comment"></i></a>
                                                    <a class="btn btn-danger btn-sm" data-bs-target="#modaldel" data-bs-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                </td>
                                                <div class="modal" id="modalket">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Masukkan Dokumen Revisi Proposal</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form action="<?php base_url() ?>/tambah_bimbingan_proposal" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Upload File</label>
                                                                        <div class="input-group file-browser">
                                                                            <input type="text" class="form-control border-right-0 browse-file" placeholder="-" name="ket_berkas" readonly>
                                                                            <label class="input-group-btn">
                                                                                <span class="btn btn-default">
                                                                                    Browse <input type="file" name="berkas" class="d-none" multiple>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Keterangan/Pesan</label>
                                                                        <textarea name="keterangan" class="ckeditor" id="ckeditor" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn ripple btn-primary" type="submit">Kirim</button>
                                                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal" id="modaldel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Hapus Bimbingan</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form action="<?php base_url() ?>/hapus_bimbingan" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_bimbingan" value="" />
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus <b></b> ini ?
                                                                    <p class="mt-3"></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn ripple btn-danger" type="submit">Hapus</button>
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

<?= $this->endSection(); ?>