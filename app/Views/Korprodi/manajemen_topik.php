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
                        <h4 class="card-title mg-b-0">Manajemen Topik</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Mengatur Topik dan Detail Topik Mahasiswa</p>
                    <div class="row mt-4">
                    </div>
                    <?= session()->getFlashdata('message') . "<br>"; ?>
                    <form action="<?php base_url() ?>/add_jadwal_sidang" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="idunit" value="">
                        <div class="form-group">
                            <label for="exampleInputPeriode">Topik</label>
                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang" name="periode">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPeriode">Detail Topik</label>
                            <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang" name="periode">
                        </div>
                        <div class="form-group">
                            <label class="ckbox"><input type="checkbox"><span>Aktif ?</span></label>
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
                        <h4 class="card-title mg-b-0">Data Topik</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data Topik dan Detail Topik Mahasiswa</a></p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Topik</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Detail Topik</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="hidden" name="id_bimbingan" value="" />
                                                <div class="btn-group">
                                                    <a class="btn btn-warning btn-sm" data-bs-target="#modalupdate" data-bs-toggle="modal" href="#"><i class="las la-pen"></i></a>
                                                    <a class="btn btn-danger btn-sm" data-bs-target="#modaldel" data-bs-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                </div>
                                            </td>
                                            <div class="modal" id="modaldel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Hapus Topik</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="<?php base_url() ?>/del_jadwal_sidang" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_jadwal" value="" />
                                                            <div class="modal-body">
                                                                Apakah anda yakin ingin menghapus topik <b></b> ?
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
                                            <div class="modal" id="modalupdate">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Edit Topik</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="<?php base_url() ?>/upd_jadwal_sidang" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_jadwal" value="" />
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idunit" value="">
                                                                <div class="form-group">
                                                                    <label for="exampleInputPeriode">Topik</label>
                                                                    <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang" name="periode">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPeriode">Detail Topik</label>
                                                                    <input type="teks" class="form-control" id="exampleInput" placeholder="Isikan Periode Sidang" name="periode">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="ckbox"><input type="checkbox"><span>Aktif ?</span></label>
                                                                </div>
                                                                <script type="text/javascript">
                                                                </script>
                                                                <div class="modal-footer">
                                                                    <button class="btn ripple btn-primary" type="submit">Update</button>
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

<?= $this->endSection(); ?>