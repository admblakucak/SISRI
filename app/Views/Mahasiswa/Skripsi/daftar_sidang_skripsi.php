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
                    <p class="tx-12 mb-0 text-muted">Meminta izin daftar sidang skripsi ke dosen pembimbing dan koordinator prodi</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">
                        <div class="list-group-item list-group-item-action" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $pem1->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <form action="<?php base_url() ?>/izin_sidang" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="nip" value="<?= $pem1->nip ?>">
                                            <input type="hidden" name="nim" value="<?= session()->get('ses_id') ?>">
                                            <input type="hidden" name="idunit" value="<?= $idunit_mhs ?>">
                                            <input type="hidden" name="sebagai" value="pembimbing 1">
                                            <div class="mt-0">
                                                <?php $cek = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND nip='" . $pem1->nip . "' AND izin_sebagai='pembimbing 1' AND jenis_sidang='skripsi'")->getResult(); ?>
                                                <h5 class="mb-1 tx-15">Pembimbing 1 (<?= $pem1->gelardepan . ' ' . $pem1->nama . ', ' . $pem1->gelarbelakang ?>)</h5>
                                                <p class="mb-0 tx-11 text-muted">NIP: <?= $pem1->nip; ?>
                                                    <?php
                                                    if (count($cek) == NULL) {
                                                        echo "<span class='text-danger ms-2'>Belum Melakukan Perizinan</span>";
                                                    } elseif ($cek[0]->status == 'ditolak') {
                                                        echo "<span class='text-danger ms-2'>Izin ditolak</span>";
                                                    } elseif ($cek[0]->status == 'menunggu') {
                                                        echo "<span class='text-warning ms-2'>Menunggu</span>";
                                                    } else {
                                                        echo "<span class='text-success ms-2'>Izin disetujui</span>";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <?php
                                            if (count($cek) != NULL) {
                                                if ($cek[0]->status == 'ditolak') { ?>
                                                    <div class="offset-1">
                                                        <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="offset-1">
                                                    <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                </div>
                                            <?php
                                            } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action br-t-1" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $pem2->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <form action="<?php base_url() ?>/izin_sidang" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="nip" value="<?= $pem2->nip ?>">
                                            <input type="hidden" name="nim" value="<?= session()->get('ses_id') ?>">
                                            <input type="hidden" name="idunit" value="<?= $idunit_mhs ?>">
                                            <input type="hidden" name="sebagai" value="pembimbing 2">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Pembimbing 2 (<?= $pem2->gelardepan . ' ' . $pem2->nama . ', ' . $pem2->gelarbelakang ?>)</h5>
                                                <p class="mb-0 tx-11 text-muted">NIP: <?= $pem2->nip; ?>
                                                    <?php $cek = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND nip='" . $pem2->nip . "' AND izin_sebagai='pembimbing 2' AND jenis_sidang='skripsi'")->getResult();
                                                    if (count($cek) == NULL) {
                                                        echo "<span class='text-danger ms-2'>Belum Melakukan Perizinan</span>";
                                                    } elseif ($cek[0]->status == 'ditolak') {
                                                        echo "<span class='text-danger ms-2'>Izin ditolak</span>";
                                                    } elseif ($cek[0]->status == 'menunggu') {
                                                        echo "<span class='text-warning ms-2'>Menunggu</span>";
                                                    } else {
                                                        echo "<span class='text-success ms-2'>Izin disetujui</span>";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <?php
                                            if (count($cek) != NULL) {
                                                if ($cek[0]->status == 'ditolak') { ?>
                                                    <div class="offset-1">
                                                        <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="offset-1">
                                                    <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                </div>
                                            <?php
                                            } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="list-group-item list-group-item-action br-t-1" href="#">
                            <div class="media mt-0">
                                <img class="avatar-lg rounded-circle my-auto me-3" src="<?php base_url() ?>/image/<?= $kor->image ?>" alt="Image description">
                                <div class="media-body">
                                    <div class="d-flex align-items-center">
                                        <form action="<?php base_url() ?>/izin_sidang" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="nip" value="<?= $kor->nip ?>">
                                            <input type="hidden" name="nim" value="<?= session()->get('ses_id') ?>">
                                            <input type="hidden" name="idunit" value="<?= $idunit_mhs ?>">
                                            <input type="hidden" name="sebagai" value="koordinator">
                                            <div class="mt-1">
                                                <h5 class="mb-1 tx-15">Koordinator Prodi (<?= $kor->gelardepan . ' ' . $kor->nama . ', ' . $kor->gelarbelakang ?>)</h5>
                                                <p class="mb-0 tx-11 text-muted">NIP: <?= $kor->nip; ?>
                                                    <?php $cek = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND nip='" . $kor->nip . "' AND izin_sebagai='koordinator'  AND jenis_sidang='skripsi'")->getResult();
                                                    if (count($cek) == NULL) {
                                                        // echo "<span class='text-danger ms-2'>Belum Melakukan Perizinan</span>";
                                                    } elseif ($cek[0]->status == 'ditolak') {
                                                        // echo "<span class='text-danger ms-2'>Izin ditolak</span>";
                                                    } elseif ($cek[0]->status == 'menunggu') {
                                                        // echo "<span class='text-warning ms-2'>Menunggu</span>";
                                                    } else {
                                                        // echo "<span class='text-success ms-2'>Izin disetujui</span>";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <?php
                                            if (count($cek) != NULL) {
                                                if ($cek[0]->status == 'ditolak') { ?>
                                                    <div class="offset-1">
                                                        <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <div class="offset-1">
                                                    <Button class="btn btn-primary btn-sm" type='submit'>Meminta Izin</Button>
                                                </div>
                                            <?php
                                            } ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                                                <th style="text-align: center; vertical-align: middle;"><span>Tanggal Dibuka</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Tanggal Ditutup</span></th>
                                                <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                            </tr>
                                        </thead>
                                        <tbody id='show_data2'>
                                            <?php
                                            date_default_timezone_set("Asia/Jakarta");
                                            $no = 1;
                                            foreach ($data_jadwal as $key) {
                                                if (date('d F Y H:i:s') <= date('d F Y H:i:s', strtotime($key->expire))) {
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $no ?></th>
                                                        <td scope="row"><?= $key->periode ?></td>
                                                        <td scope="row"><?= $key->open ?></td>
                                                        <td scope="row"><?= $key->expire ?></td>
                                                        <td style="text-align: center; vertical-align: middle;">
                                                            <input type="hidden" name="id_bimbingan" value="" />
                                                            <?php
                                                            $acc_pem1 = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND izin_sebagai='pembimbing 1' AND jenis_sidang='skripsi' AND `status`='disetujui' ")->getResult();
                                                            $acc_pem2 = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND izin_sebagai='pembimbing 2' AND jenis_sidang='skripsi' AND `status`='disetujui' ")->getResult();
                                                            $acc_kor = $db->query("SELECT * FROM tb_perizinan_sidang WHERE nim='" . session()->get('ses_id') . "' AND izin_sebagai='koordinator' AND jenis_sidang='skripsi' AND `status`='disetujui' ")->getResult();
                                                            $cek_pendaftar_sidang = $db->query("SELECT * FROM tb_pendaftar_sidang WHERE nim='" . session()->get('ses_id') . "' AND id_jadwal='" . $key->id_jadwal . "' ")->getResult();
                                                            if (date('d F Y H:i:s') < date('d F Y H:i:s', strtotime($key->open))) {
                                                                echo "<a class='text-danger'>Belum Dibuka</a>";
                                                            } elseif (date('d F Y H:i:s') >= date('d F Y H:i:s', strtotime($key->open))) {
                                                                if (count($acc_pem1) != NULL && count($acc_pem2) != NULL) {
                                                                    if (count($cek_pendaftar_sidang) != NULL) {
                                                                        echo "<a class='text-success'>Telah Mendaftar</a>";
                                                                    } else {
                                                            ?>
                                                                        <div class="btn-group">
                                                                            <a class="btn btn-primary btn-sm" data-bs-target="#modaldaftar<?= $key->id_jadwal ?>" id="revisi" data-bs-toggle="modal" href="#">Daftar Seminar</a>
                                                                        </div>
                                                            <?php }
                                                                } else {
                                                                    echo "<a class='text-danger'> Dapat mendaftar apabila telah mendapat izin dari pembimbing 1 & pembimbing 2. </a>";
                                                                }
                                                            } ?>
                                                        </td>
                                                        <div class="modal" id="modaldaftar<?= $key->id_jadwal ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content modal-content-demo">
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title">Daftar Seminar Proposal</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <form action="<?php base_url() ?>/mendaftar_sidang" method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id_jadwal" value="<?= $key->id_jadwal ?>" />
                                                                        <div class="modal-body">
                                                                            Apakah anda yakin ingin mendaftar <b><?= $key->periode ?></b> ?
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
                                            <?php $no++;
                                                }
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

<?= $this->endSection(); ?>