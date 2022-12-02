<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Permintaan Persetujuan</h3>
                    <p class="tx-12 mb-0 text-muted">Meminta izin daftar seminar proposal ke dosen pembimbing dan koordinator prodi</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $pem1->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-0">
                                            <h5 class="mb-1 tx-15">Pembimbing 1 (<?= $pem1->gelardepan . ' ' . $pem1->nama . ', ' . $pem1->gelarbelakang ?>)</h5>
                                            <p class="mb-0 tx-11 text-muted">NIP: <?= $pem1->nip; ?> <span class="text-success ms-2">Setuju</span></p>
                                        </div>
                                        <div class="offset-1">
                                            <Button class="btn btn-primary btn-sm">Meminta Izin</Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-t-1" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $pem2->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Pembimbing 2 (<?= $pem2->gelardepan . ' ' . $pem2->nama . ', ' . $pem2->gelarbelakang ?>)</h5>
                                            <p class="mb-0 tx-11 text-muted">NIP: <?= $pem2->nip; ?> <span class="text-danger ms-1">Menunggu</span></p>
                                        </div>
                                        <div class="offset-1">
                                            <Button class="btn btn-primary btn-sm">Meminta Izin</Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-t-1" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $kor->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <div class="mt-1">
                                            <h5 class="mb-1 tx-15">Koordinator Prodi (<?= $kor->gelardepan . ' ' . $kor->nama . ', ' . $kor->gelarbelakang ?>)</h5>
                                            <p class="mb-0 tx-11 text-muted">NIP: <?= $kor->nip; ?><span class="text-success ms-2">Setuju</span></p>
                                        </div>
                                        <div class="offset-1">
                                            <Button class="btn btn-primary btn-sm">Meminta Izin</Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
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
                                                <th style="text-align: center; vertical-align: middle;"><span>Periode Sidang</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                            </tr>
                                        </thead>
                                        <tbody id='show_data2'>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td scope="row">2022</td>
                                                <td scope="row">kjkjhjg</td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <input type="hidden" name="id_bimbingan" value="" />
                                                    <div class="btn-group">
                                                        <a class="btn btn-primary btn-sm" data-bs-target="#modaldel2" id="revisi" data-bs-toggle="modal" href="#">Daftar Seminar Proposal</a>
                                                </td>
                                                <div class="modal" id="modalket2">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Catatan / Revisi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form action="<?php base_url() ?>/download_berkas_bimbingan" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_bimbingan" value="" />
                                                                <div class="modal-body">
                                                                    <p class="mt-3"></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn ripple btn-primary" type="submit">Download Berkas</button>
                                                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

<?= $this->endSection(); ?>