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
                        <h4 class="card-title mg-b-0">Data Pendaftar Sidang</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Data pendaftar seminar proposal dan sidang skripsi</a></p>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;"><span>No.</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Mahasiswa</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Judul</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 1</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 2</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Mendaftar Pada</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Penguji 1</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Penguji 2</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Penguji 3</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Waktu Sidang</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Ruang Sidang</span></th>
                                            <th style="text-align: center; vertical-align: middle;"><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        date_default_timezone_set("Asia/Jakarta");
                                        $no = 1;
                                        foreach ($data_pendaftar as $key) {
                                            $mhs = $db->query("SELECT * FROM tb_mahasiswa WHERE nim='$key->nim'")->getResult();
                                            $judul = $db->query("SELECT * FROM tb_pengajuan_topik WHERE nim='$key->nim'")->getResult();
                                            $pem1 = $db->query("SELECT * FROM tb_pengajuan_pembimbing a left join tb_dosen b on a.nip=b.nip WHERE a.nim='$key->nim' AND a.sebagai='1' AND a.status_pengajuan='diterima'")->getResult();
                                            $pem2 = $db->query("SELECT * FROM tb_pengajuan_pembimbing a left join tb_dosen b on a.nip=b.nip WHERE a.nim='$key->nim' AND a.sebagai='2' AND a.status_pengajuan='diterima'")->getResult();
                                            $penguji1 = $db->query("SELECT * FROM tb_penguji a left join tb_dosen b on a.nip=b.nip WHERE a.nim='$key->nim' AND a.sebagai='1' AND a.id_pendaftar='$key->id_pendaftar'")->getResult();
                                            $penguji2 = $db->query("SELECT * FROM tb_penguji a left join tb_dosen b on a.nip=b.nip WHERE a.nim='$key->nim' AND a.sebagai='2' AND a.id_pendaftar='$key->id_pendaftar'")->getResult();
                                            $penguji3 = $db->query("SELECT * FROM tb_penguji a left join tb_dosen b on a.nip=b.nip WHERE a.nim='$key->nim' AND a.sebagai='3' AND a.id_pendaftar='$key->id_pendaftar'")->getResult();
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no ?></th>
                                                <td><?= $key->nim . ' - ' . $mhs[0]->nama ?></td>
                                                <td><?= $judul[0]->judul_topik ?></td>
                                                <td><?= $pem1[0]->gelardepan . ' ' . $pem1[0]->nama . ', ' . $pem1[0]->gelarbelakang ?></td>
                                                <td><?= $pem2[0]->gelardepan . ' ' . $pem2[0]->nama . ', ' . $pem2[0]->gelarbelakang ?></td>
                                                <td><?= $key->create_at ?></td>
                                                <td><?= $penguji1[0]->gelardepan . ' ' . $penguji1[0]->nama . ', ' . $penguji1[0]->gelarbelakang ?></td>
                                                <td><?= $penguji2[0]->gelardepan . ' ' . $penguji2[0]->nama . ', ' . $penguji2[0]->gelarbelakang ?></td>
                                                <td><?= $penguji3[0]->gelardepan . ' ' . $penguji3[0]->nama . ', ' . $penguji3[0]->gelarbelakang ?></td>
                                                <td><?= $key->waktu_sidang ?></td>
                                                <td><?= $key->ruang_sidang ?></td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" data-bs-target="#modalupdate<?= $key->id_pendaftar ?>" data-bs-toggle="modal" href="#"><i class="las la-pen">Setting</i></a>
                                                </td>
                                                <div class="modal" id="modalupdate<?= $key->id_pendaftar ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content modal-content-demo">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title">Edit Jadwal Sidang</h6><button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <form action="<?php base_url() ?>/setting_jadwal_sidang" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id_pendaftar" value="<?= $key->id_pendaftar ?>" />
                                                                <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>" />
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="idunit" value="<?= $idunit ?>">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputTutup">Waktu Sidang</label>
                                                                        <div class="row row-sm">
                                                                            <div class="input-group col-md-12">
                                                                                <div class="input-group-text">
                                                                                    <div class="input-group-text">
                                                                                        <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                                                    </div>
                                                                                </div>
                                                                                <input name='waktu_sidang' class="form-control" id="datepickeropen<?= $key->id_pendaftar ?>" value="<?= $key->waktu_sidang ?>" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPeriode">Ruang Sidang</label>
                                                                        <input type="teks" class="form-control" id="exampleInput" value="<?= $key->ruang_sidang ?>" name="ruang_sidang">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputJenis Sidang">Penguji 1</label>
                                                                        <div class="row row-sm">
                                                                            <select class="form-control select" name="nip_p1">
                                                                                <option disabled> Pilih Penguji 1
                                                                                </option>
                                                                                <option value="seminar proposal">
                                                                                    Seminar Proposal
                                                                                </option>
                                                                                <option value="sidang skripsi">
                                                                                    Sidang Skripsi
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputJenis Sidang">Penguji 2</label>
                                                                        <div class="row row-sm">
                                                                            <select class="form-control select" name="nip_p2">
                                                                                <option disabled> Pilih Penguji 2
                                                                                </option>
                                                                                <option value="seminar proposal">
                                                                                    Seminar Proposal
                                                                                </option>
                                                                                <option value="sidang skripsi">
                                                                                    Sidang Skripsi
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputJenis Sidang">Penguji 3</label>
                                                                        <div class="row row-sm">
                                                                            <select class="form-control select" name="nip_3">
                                                                                <option disabled> Pilih Penguji 3
                                                                                </option>
                                                                                <option value="seminar proposal">
                                                                                    Seminar Proposal
                                                                                </option>
                                                                                <option value="sidang skripsi">
                                                                                    Sidang Skripsi
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <script type="text/javascript">
                                                                    $(function() {
                                                                        $('#datepickeropen<?= $key->id_pendaftar ?>').datetimepicker();
                                                                        $('#datepickerexpire<?= $key->id_pendaftar ?>').datetimepicker();
                                                                    });
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