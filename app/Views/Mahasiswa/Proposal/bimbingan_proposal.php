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
                                <h4 class="card-title mg-b-0">Bimbingan Proposal Mahasiswa</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                        </div>
                        <p class="tx-12 tx-gray-500 mb-2">Bimbingan Proposal kepada Dosen Pembimbing</a></p>
                    </div>
                    <div class="row row-sm main-content-app mb-4">
                        <div class="card col-xl-3 col-lg-4">
                            <div class="main-content-left mt-2">
                                <div class="card-body p-0 customers mt-1">
                                    <div class="list-group list-lg-group list-group-flush">
                                        <?php
                                        $jumlah_pemberitahuan = 0;
                                        foreach ($pemberitahuan as $pem) { ?>
                                            <div class="list-group-item list-group-item-action br-t-1">
                                                <div class="media mt-0">
                                                    <div class="media-body">
                                                        <div class="d-flex align-items-center">
                                                            <div class="mt-0">
                                                                <h5 class="mb-1 tx-15">
                                                                    <?= $pem->pokok_bimbingan ?>
                                                                </h5>
                                                                <p class="mb-0 tx-13 text-muted"><?php foreach ($dosen_pembimbing as $key2) {
                                                                                                        if ($key2->nip == $pem->from) {
                                                                                                            echo 'Pembimbing ' . $key2->sebagai . ' - ' . $key2->gelardepan . ' ' . $key2->nama . ', ' . $key2->gelarbelakang;
                                                                                                        }
                                                                                                    } ?></p>
                                                            </div>
                                                            <span class="text-danger ms-2">Belum Dibaca</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $jumlah_pemberitahuan++;
                                        }
                                        if ($jumlah_pemberitahuan == 0) { ?>
                                            <p class="text-center mt-2">
                                                Tidak Ada Pemberitahuan Terbaru.
                                            </p>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-8">
                            <div class="main-content-body main-content-body">
                                <div class="table-responsive pe-2 ps-2 pt-2">
                                    <a class="btn btn-primary mb-3" data-bs-target="#modaladd" data-bs-toggle="modal" href="">Kirim Bimbingan</a>
                                    <?= session()->getFlashdata('message_bimbingan') . "<br>"; ?>
                                    <div class="modal" id="modaladd">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Masukkan Dokumen Bimbingan Proposal</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form action="<?php base_url() ?>/tambah_bimbingan_proposal" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Pembimbing</label>
                                                            <select class="form-select" name="pembimbing" aria-label="Default select example">
                                                                <option selected disabled>Pilih Pembimbing
                                                                </option>
                                                                <?php foreach ($dosen_pembimbing as $key) { ?>
                                                                    <option value="<?= $key->nip ?>">Pembimbing <?= $key->sebagai . ' - ' . $key->gelardepan . ' ' . $key->nama . ', ' . $key->gelarbelakang ?></option>
                                                                <?php
                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Pokok Bimbingan</label>
                                                            <input type="teks" name="pokok_bimbingan" class="form-control" id="exampleInput" placeholder="Contoh : Bimbingan BAB I">
                                                        </div>
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
                                    <div class="panel panel-primary tabs-style-2">
                                        <div class="tab-menu-heading">
                                            <div class="tabs-menu1">
                                                <ul class="nav panel-tabs main-nav-line">
                                                    <li><a href="#pem1" class="nav-link active" data-bs-toggle="tab">Pembimbing 1</a></li>
                                                    <li><a href="#pem2" class="nav-link" data-bs-toggle="tab">Pembimbing 2</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="pem1">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable1">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Pokok Bimbingan</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dari</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Untuk</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Waktu</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id='show_data'>
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($progress_bimbingan1 as $key) {
                                                                        ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $no; ?></th>
                                                                                <td scope="row"><?= $key->pokok_bimbingan; ?></td>
                                                                                <td scope="row"><?php
                                                                                                $n = 0;
                                                                                                foreach ($dosen_pembimbing as $key1) {
                                                                                                    if ($key1->nip == $key->from) {
                                                                                                        echo 'Pembimbing ' . $key1->sebagai . ' - ' . $key1->gelardepan . ' ' . $key1->nama . ', ' . $key1->gelarbelakang;
                                                                                                        $n = $n + 1;
                                                                                                    }
                                                                                                }
                                                                                                if ($n == 0) {
                                                                                                    $nama_mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim='" . $key->from . "'")->getResult()[0]->nama;
                                                                                                    echo $nama_mhs;
                                                                                                } ?></td>
                                                                                <td scope="row"><?php
                                                                                                $n = 0;
                                                                                                foreach ($dosen_pembimbing as $key1) {
                                                                                                    if ($key1->nip == $key->to) {
                                                                                                        echo 'Pembimbing ' . $key1->sebagai . ' - ' . $key1->gelardepan . ' ' . $key1->nama . ', ' . $key1->gelarbelakang;
                                                                                                        $n = $n + 1;
                                                                                                    }
                                                                                                }
                                                                                                if ($n == 0) {
                                                                                                    $nama_mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim='" . $key->to . "'")->getResult()[0]->nama;
                                                                                                    echo $nama_mhs;
                                                                                                } ?></td>
                                                                                <td scope="row"><?= $key->create_at; ?></td>
                                                                                <td scope="row"><?php
                                                                                                if ($key->status_baca == 'dibaca') {
                                                                                                    echo '<a class="text-success">Dibaca</a>';
                                                                                                } else {
                                                                                                    echo '<a class="text-danger">Belum Dibaca</a>';
                                                                                                }
                                                                                                ?></td>
                                                                                <td style="text-align: center; vertical-align: middle;">
                                                                                    <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                    <?php if ($key->from == session()->get('ses_id')) { ?>
                                                                                        <div class="btn-group">
                                                                                            <a class="btn btn-primary btn-sm" data-bs-target="#modalket<?= $key->id_bimbingan ?>" id="revisi" data-bs-toggle="modal" href="#"><i class="far fa-eye"></i></a>
                                                                                            <?php if ($key->status_baca != 'dibaca') { ?>
                                                                                                <a class="btn btn-danger btn-sm" data-bs-target="#modaldel<?= $key->id_bimbingan ?>" data-bs-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                                                            <?php }; ?>
                                                                                        </div>
                                                                                    <?php } else { ?>
                                                                                        <a class="btn btn-primary btn-sm item_revisi" data="<?= $key->id_bimbingan ?>" href="#"><i class="far fa-eye"></i></a>
                                                                                    <?php } ?>
                                                                                </td>

                                                                                <div class="modal" id="modalket<?= $key->id_bimbingan ?>">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content modal-content-demo">
                                                                                            <div class="modal-header">
                                                                                                <h6 class="modal-title">Catatan / Revisi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                                            </div>
                                                                                            <form action="<?php base_url() ?>/download_berkas_bimbingan" method="POST" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                                <div class="modal-body">
                                                                                                    <p class="mt-3"><?= $key->keterangan ?></p>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button class="btn ripple btn-primary" type="submit">Download Berkas</button>
                                                                                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                                                                </div>

                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal" id="modaldel<?= $key->id_bimbingan ?>">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content modal-content-demo">
                                                                                            <div class="modal-header">
                                                                                                <h6 class="modal-title">Hapus Bimbingan</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                                            </div>
                                                                                            <form action="<?php base_url() ?>/hapus_bimbingan" method="POST" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                                <div class="modal-body">
                                                                                                    Apakah anda yakin ingin menghapus <b><?= $key->pokok_bimbingan ?></b> ini ?
                                                                                                    <p class="mt-3"><?= $key->keterangan ?></p>
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
                                                                        <?php $no++;
                                                                        } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="pem2">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped mg-b-0 text-md-nowrap" id="validasitable2">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Pokok Bimbingan</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Dari</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Untuk</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Waktu</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Status</span></th>
                                                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id='show_data2'>
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($progress_bimbingan2 as $key) {
                                                                        ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $no; ?></th>
                                                                                <td scope="row"><?= $key->pokok_bimbingan; ?></td>
                                                                                <td scope="row"><?php
                                                                                                $n = 0;
                                                                                                foreach ($dosen_pembimbing as $key1) {
                                                                                                    if ($key1->nip == $key->from) {
                                                                                                        echo 'Pembimbing ' . $key1->sebagai . ' - ' . $key1->gelardepan . ' ' . $key1->nama . ', ' . $key1->gelarbelakang;
                                                                                                        $n = $n + 1;
                                                                                                    }
                                                                                                }
                                                                                                if ($n == 0) {
                                                                                                    $nama_mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim='" . $key->from . "'")->getResult()[0]->nama;
                                                                                                    echo $nama_mhs;
                                                                                                } ?></td>
                                                                                <td scope="row"><?php
                                                                                                $n = 0;
                                                                                                foreach ($dosen_pembimbing as $key1) {
                                                                                                    if ($key1->nip == $key->to) {
                                                                                                        echo 'Pembimbing ' . $key1->sebagai . ' - ' . $key1->gelardepan . ' ' . $key1->nama . ', ' . $key1->gelarbelakang;
                                                                                                        $n = $n + 1;
                                                                                                    }
                                                                                                }
                                                                                                if ($n == 0) {
                                                                                                    $nama_mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim='" . $key->to . "'")->getResult()[0]->nama;
                                                                                                    echo $nama_mhs;
                                                                                                } ?></td>
                                                                                <td scope="row"><?= $key->create_at; ?></td>
                                                                                <td scope="row"><?php
                                                                                                if ($key->status_baca == 'dibaca') {
                                                                                                    echo '<a class="text-success">Dibaca</a>';
                                                                                                } else {
                                                                                                    echo '<a class="text-danger">Belum Dibaca</a>';
                                                                                                }
                                                                                                ?></td>
                                                                                <td style="text-align: center; vertical-align: middle;">
                                                                                    <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                    <?php if ($key->from == session()->get('ses_id')) { ?>
                                                                                        <div class="btn-group">
                                                                                            <a class="btn btn-primary btn-sm" data-bs-target="#modalket2<?= $key->id_bimbingan ?>" id="revisi" data-bs-toggle="modal" href="#"><i class="far fa-eye"></i></a>
                                                                                            <?php if ($key->status_baca != 'dibaca') { ?>
                                                                                                <a class="btn btn-danger btn-sm" data-bs-target="#modaldel2<?= $key->id_bimbingan ?>" data-bs-toggle="modal" href="#"><i class="las la-trash"></i></a>
                                                                                            <?php }; ?>
                                                                                        </div>
                                                                                    <?php } else { ?>
                                                                                        <a class="btn btn-primary btn-sm item_revisi2" data="<?= $key->id_bimbingan ?>" href="#"><i class="far fa-eye"></i></a>
                                                                                    <?php } ?>
                                                                                </td>

                                                                                <div class="modal" id="modalket2<?= $key->id_bimbingan ?>">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content modal-content-demo">
                                                                                            <div class="modal-header">
                                                                                                <h6 class="modal-title">Catatan / Revisi</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                                            </div>
                                                                                            <form action="<?php base_url() ?>/download_berkas_bimbingan" method="POST" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                                <div class="modal-body">
                                                                                                    <p class="mt-3"><?= $key->keterangan ?></p>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button class="btn ripple btn-primary" type="submit">Download Berkas</button>
                                                                                                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                                                                </div>

                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal" id="modaldel2<?= $key->id_bimbingan ?>">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content modal-content-demo">
                                                                                            <div class="modal-header">
                                                                                                <h6 class="modal-title">Hapus Bimbingan</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                                            </div>
                                                                                            <form action="<?php base_url() ?>/hapus_bimbingan" method="POST" enctype="multipart/form-data">
                                                                                                <input type="hidden" name="id_bimbingan" value="<?php echo $key->id_bimbingan; ?>" />
                                                                                                <div class="modal-body">
                                                                                                    Apakah anda yakin ingin menghapus <b><?= $key->pokok_bimbingan ?></b> ini ?
                                                                                                    <p class="mt-3"><?= $key->keterangan ?></p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<script>
    var id2;
    $('#show_data').on('click', '.item_revisi', function() {
        var id = $(this).attr('data');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url() . "/baca_bimbingan_proposal"; ?>",
            data: {
                rowid: id
            },
            dataType: "text",
            // success: function(data) {
            // alert(data);
            // },
            // error: function(data) {
            //     alert("failed");
            // }
        });
        $('#modalket' + id).modal("show")
        $('#modalket' + id).on('hidden.bs.modal', function(e) {
            location.reload();
        });
    });
    $('#show_data2').on('click', '.item_revisi2', function() {
        var id = $(this).attr('data');
        $.ajax({
            method: "POST",
            url: "<?php echo base_url() . "/baca_bimbingan_proposal"; ?>",
            data: {
                rowid: id
            },
            dataType: "text",
            // success: function(data) {
            // alert(data);
            // },
            // error: function(data) {
            //     alert("failed");
            // }
        });
        $('#modalket2' + id).modal("show")
        $('#modalket2' + id).on('hidden.bs.modal', function(e) {
            location.reload();
        });
    });
</script>
<?= $this->endSection(); ?>