<style>
    .cs {
        color: red;
    }
</style>
<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title mb-0">Beranda Mahasiswa</h6>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Tahap Mahasiswa dalam Melakukan Skripsi</p>
                </div>
                <div class="row mt-3">
                    <div class="vtimeline">
                        <div class="timeline-wrapper timeline-wrapper-primary">
                            <div class="timeline-badge success"><img class="timeline-image" alt="img" src="../../assets/img/faces/3.jpg"> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Ajukan Topik dan Dosen Pembimbing</h6>
                                </div>
                                <div class="timeline-body">
                                    <table>
                                        <tr>
                                            <td>Topik</td>
                                            <td>:</td>
                                            <td>peramalan</td>
                                        </tr>
                                        <tr>
                                            <td>Judul</td>
                                            <td>:</td>
                                            <td>produksi sangkar burung</td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing 1</td>
                                            <td>:</td>
                                            <td>tajuddin</td>
                                            <td>
                                                <p class="cs">Menunggu</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing 2</td>
                                            <td>:</td>
                                            <td>Amin</td>
                                            <td>
                                                <p class="cs">Menunggu</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="timeline-footer d-flex align-items-center flex-wrap">
                                    <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>19
                                        Oct 2019</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-inverted timeline-wrapper-secondary">
                            <div class="timeline-badge"><i class="las la-business-time"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Notif Bimbingan Proposal</h6>
                                </div>
                                <div class="timeline-body">
                                    <p>You have a meeting at Laborator Office Today.</p>
                                </div>
                                <div class="timeline-footer d-flex align-items-center flex-wrap">
                                    <i class="fe fe-heart  text-muted me-1"></i>
                                    <span>25</span>
                                    <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>10th
                                        Oct 2019</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-wrapper-info">
                            <div class="timeline-badge"><i class="las la-user-circle"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Status perizinan mengikuti sidang</h6>
                                </div>
                                <div class="timeline-body">
                                    <table>
                                        <tr>
                                            <td>Pembimbing 1</td>
                                            <td class="row mt-3">
                                                <p class="csDI">Dizinkan</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing 2</td>
                                            <td class="row mt-3">
                                                <p class="csDI">Dizinkan</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Koorprodi</td>
                                            <td class="row mt-3">
                                                <p class="csDI">Dizinkan</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jadwal daftar seminar</td>
                                            <td class="row mt-3">
                                                <p class="csDI">Dibuka</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="timeline-footer d-flex align-items-center flex-wrap">
                                    <i class="fe fe-heart  text-muted me-1"></i>
                                    <span>19</span>
                                    <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>5th
                                        Oct 2019</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                            <div class="timeline-badge success"><img class="timeline-image" alt="img" src="../../assets/img/faces/12.jpg"> </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Jadwal pelaksanaan Seminar Proposal</h6>
                                </div>
                                <div class="timeline-body">
                                    <table class="table">
                                        <tr>
                                            <th>Penguji 1</th>
                                            <th>Penguji 2</th>
                                            <th>Penguji 3</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                        </tr>
                                        <tr>
                                            <td>Dr. Budi Dwi Satoto, S.Kom., MT.</td>
                                            <td>Ach. Dafid, ST., MT.</td>
                                            <td>Khozaimi, S.Kom., M.Kom.</td>
                                            <td>20/09/2022</td>
                                            <td>09:45 wib</td>
                                            <td>F03</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="timeline-footer d-flex align-items-center flex-wrap">
                                    <i class="fe fe-heart  text-muted me-1"></i>
                                    <span>19</span>
                                    <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>27th
                                        Sep 2017</span>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-wrapper timeline-wrapper-success">
                            <div class="timeline-badge"><i class="las la-envelope-open-text"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h6 class="timeline-title">Notif Revisi dan status Revisi</h6>
                                </div>
                                <div class="timeline-body">
                                    <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah
                                        plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora
                                        plaxo ideeli hulu weebly balihoo....</p>
                                    <a class="btn ripple btn-primary text-white mb-3">Read more</a>
                                </div>
                                <div class="timeline-footer d-flex align-items-center flex-wrap">
                                    <i class="fe fe-heart  text-muted me-1"></i>
                                    <span>25</span>
                                    <span class="ms-auto"><i class="fe fe-calendar text-muted me-1"></i>25th
                                        Sep 2017</span>
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