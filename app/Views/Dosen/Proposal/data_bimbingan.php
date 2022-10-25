<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Data Bimbingan</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data Bimbingan Proposal Mahasiswa</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-vcenter text-nowrap mb-0" id="example1">
                            <thead>
                                <tr>
                                    <th><span>&nbsp;</span></th>
                                    <th><span>Nim</span></th>
                                    <th><span>Nama</span></th>
                                    <th><span>Jenis Kelamin</span></th>
                                    <th><span>Prodi</span></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_mhs_bimbingan as $key) { ?>
                                    <tr>
                                        <td>
                                            <img alt="avatar" class="rounded-circle avatar-md me-2" src="../../assets/img/faces/2.jpg">
                                        </td>
                                        <td>
                                            <?= $key->nim; ?>
                                        </td>
                                        <td>
                                            <?= $key->nama_mhs; ?>
                                        </td>
                                        <td>
                                            <?php if ($key->jk == 'P') {
                                                echo 'Perempuan';
                                            } else {
                                                echo 'Laki-Laki';
                                            } ?>
                                        </td>
                                        <td>
                                            <?= $key->namaunit; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/bimbingan" class="btn btn-primary btn-sm">Riwayat Bimbingan</a>
                                                <?php
                                                $jumlah = $db->query("SELECT COUNT(id_bimbingan) AS jumlah FROM tb_bimbingan WHERE `from`='" . $key->nim . "' AND status_baca='belum dibaca'")->getResult()[0]->jumlah;
                                                if ($jumlah > 0) {
                                                    echo "<a class='btn btn-danger btn-sm'>$jumlah</a>";
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>