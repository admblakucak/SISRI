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
                        <h4 class="card-title mg-b-0">Data Unit</h4>
                        <?php
                        if ($count_data <= $total_data) {
                            $aktif = 0;
                            if ($max_page == 0) { ?>
                                <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/1">UPDATE</a>
                                <?php
                            } elseif ($max_page == 1) {
                                $data_jum = $db->query("SELECT count(idunit) as jumlah from tb_unit where page=$max_page")->getResult();
                                if ($data_jum[0]->jumlah < 1000) { ?>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/<?= $max_page ?>">UPDATE</a>
                                <?php
                                } else { ?>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/<?= $max_page + 1 ?>">UPDATE</a>
                                <?php
                                }
                                ?>
                                <?php
                            } else {
                                for ($i = 1; $i < $max_page; $i++) {
                                    $data_jum = $db->query("SELECT count(idunit) as jumlah from tb_unit where page=$i")->getResult();
                                    if ($data_jum[0]->jumlah < 1000) { ?>
                                        <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/<?= $i ?>">UPDATE</a>
                                        <?php $aktif = 1;
                                        break;
                                    }
                                }
                                if ($aktif == 0) {
                                    if ($max_page == $total_page) {
                                        $data_jum = $db->query("SELECT count(idunit) as jumlah from tb_unit where page=$max_page")->getResult();
                                        if ($data_jum[0]->jumlah < 1000) { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/<?= $max_page ?>">UPDATE</a>
                                        <?php
                                        }
                                    } else {
                                        $data_jum = $db->query("SELECT count(idunit) as jumlah from tb_unit where page=$max_page")->getResult();
                                        if ($data_jum[0]->jumlah < 1000) { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url() ?>/update_data_unit/<?= $max_page + 1 ?>">UPDATE</a>
                        <?php
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data unit yang telah tersinkronasi dengan Siakad UTM. </a></p>
                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>ID</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Nama Unit</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Jenis</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Jenjang</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Parent Unit</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($data as $key) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $key->idunit; ?></td>
                                                <td><?= $key->namaunit; ?></td>
                                                <td><?php
                                                    if ($key->jenisunit == 'F') {
                                                        echo "FAKULTAS";
                                                    } elseif ($key->jenisunit == 'P') {
                                                        echo "PROGRAM STUDI";
                                                    } elseif ($key->jenisunit == 'J') {
                                                        echo "JURUSAN";
                                                    } else {
                                                        echo "UNIVERSITAS";
                                                    }
                                                    ?></td>
                                                <td><?= $key->idjenjang; ?></td>
                                                <td><?= $key->parentunit; ?></td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
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