<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-cl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="card-title mg-b-0">Input Nilai Bimbingan</div>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Menginputkan nilai bimbingan skripsi mahasiswa</p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-2"><span>Nama</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Judul Skripsi</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Nilai</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-3"><span>Status Bimbingan Skripsi</span></th>
                                            <th style="text-align: center; vertical-align: middle;" class="col-sm-7 col-md-6 col-lg-4"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_mhs_bimbingan as $key) {
                                            $judul = $db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='" . $key['nim'] . "'")->getResult();
                                            $nilai = $db->query("SELECT * FROM tb_nilai WHERE nim='" . $key['nim'] . "' AND nip='" . session()->get('ses_id') . "' AND sebagai='pembimbing " . $key['sebagai'] . "'")->getResult();
                                            $sidang = $db->query("SELECT * FROM tb_pendaftar_sidang a LEFT JOIN tb_jadwal_sidang b ON a.`id_jadwal`=b.`id_jadwal` WHERE a.`nim`='" . $key['nim'] . "' AND b.`jenis_sidang`='sidang skripsi' ORDER BY create_at DESC LIMIT 1")->getResult();
                                            $berita_acara = $db->query("SELECT * FROM tb_berita_acara WHERE `nim`='" . $key['nim'] . "' AND nip='" . session()->get('ses_id') . "' AND sebagai='pembimbing " . $key['sebagai'] . "' AND status='ditandatangani' AND jenis_sidang='skripsi")->getResult();
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $key['nim'] . ' - ' . $key['nama_mhs']; ?></td>
                                                <td><?= $judul[0]->judul_topik ?></td>
                                                <td><?= empty($nilai) ? '<span class="text-danger ms-2">Belum Dinilai</span>' : $nilai[0]->nilai ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($sidang)) {
                                                        if ($sidang[0]->hasil_sidang == '1') {
                                                            echo "Disetuji tanpa perbaikan";
                                                        } elseif ($sidang[0]->hasil_sidang == '2') {
                                                            echo "Disetuji dengan perbaikan";
                                                        } else {
                                                            echo "Tidak disetujui/mengulang";
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php
                                                    if (!empty($sidang)) {
                                                        if (!empty($berita_acara)) {
                                                    ?>
                                                            <a class="btn btn-success btn-sm" data-bs-target="#modal<?= $no ?>" data-bs-toggle="modal" href="">Set Nilai</a>
                                                    <?php } else {
                                                            echo "<span class='text-danger ms-2'>Berita Acara Belum Ditanda Tangani</span>";
                                                        }
                                                    } else {
                                                        echo "<span class='text-danger ms-2'>Belum Mendaftar Sidang Skripsi</span>";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <div class="modal" id="modal<?= $no ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Menginputkan Nilai</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="<?php base_url() ?>/save_nilai_bimbingan" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="nim" value="<?= $key['nim'] ?>">
                                                                <input type="hidden" name="sebagai" value="pembimbing <?= $key['sebagai'] ?>">
                                                                <input type="hidden" name="id_pendaftar" value="<?= !empty($sidang) ? $sidang[0]->id_pendaftar : '' ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Anda Sebagai : <b>Pembimbing <?= $key['sebagai'] ?></b></label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Status Ujian Skripsi</label>
                                                                    <label class="rdiobox mb-1">
                                                                        <input <?= !empty($sidang) ? ($sidang[0]->hasil_sidang == '1' ? "checked" : '') : '' ?> <?= $key['sebagai'] != '1' ? "disabled" : '' ?> type="radio" name="status" value="1"><span>Disetuji tanpa perbaikan</span>
                                                                    </label>
                                                                    <label class="rdiobox mb-1">
                                                                        <input <?= !empty($sidang) ? ($sidang[0]->hasil_sidang == '2' ? "checked" : '') : '' ?> <?= $key['sebagai'] != '1' ? "disabled" : '' ?> type="radio" name="status" value="2"><span>Disetujui dengan perbaikan</span>
                                                                    </label>
                                                                    <label class="rdiobox">
                                                                        <input <?= !empty($sidang) ? ($sidang[0]->hasil_sidang == '3' ? "checked" : '') : '' ?> <?= $key['sebagai'] != '1' ? "disabled" : '' ?> type="radio" name="status" value="3"><span>Tidak disetujui/mengulang</span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Nilai</label>
                                                                    <input type="teks" class="form-control" id="exampleInput" name='nilai' value='<?= empty($nilai) ? '' : $nilai[0]->nilai ?>' placeholder="0 - 100">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn ripple btn-primary" type="submit">Simpan</button>
                                                                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Keluar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

<?= $this->endSection(); ?>