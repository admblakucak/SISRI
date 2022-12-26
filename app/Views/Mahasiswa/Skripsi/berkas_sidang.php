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
                        <h6 class="card-title mb-0">Berkas Sidang Skripsi</h6>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Berkas Bimbingan Sidang Skripsi dan Berita Acara</p>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-8 col-lg-8 col-xl-8">
                            <label class="form-label">Berkas Bimbingan Skripsi</label>
                            <p class="tx-12 tx-gray-500 pt-0"></p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="btn-list">
                                <a aria-controls="multiCollapseExample1" aria-expanded="false" class="btn ripple btn-light plus float-right" href=".multi-collapse" data-bs-toggle="collapse" role="button">Detail Berkas</a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <form action="update_pass" method="POST" enctype="multipart/form-data">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="border-0">Pembimbing 1</th>
                                                <th class="border-0">Pembimbing 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-0">Dr. Budi Dwi Satoto, ST., M.Kom.</td>
                                                <td class="border-0">Ach. Dafid, ST., MT.</td>
                                            </tr>
                                            <tr>
                                                <td class="border-0">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm" type="button">Download</button>
                                                    </div>
                                                </td>
                                                <td class="border-0">
                                                    <div class="btn-group">
                                                        <button class="btn btn-primary btn-sm" type="button">Download</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8 col-lg-8 col-xl-8">
                            <label class="form-label">Berkas Berita Acara Sidang Skripsi</label>
                            <p class="tx-12 tx-gray-500 pt-0">Berkas Berita Acara Pembimbing 1, 2 dan Penguji 1, 2 dan 3</p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4">
                            <div class="btn-list">
                                <a aria-controls="multiCollapseExample2" aria-expanded="false" class="btn ripple btn-light plus float-right" href=".multi-collapse2" data-bs-toggle="collapse" role="button">Detail Berkas</a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="collapse multi-collapse2" id="multiCollapseExample2">
                                    <form action="update_pass" method="POST" enctype="multipart/form-data">
                                        <Label class="form-lable">Status Ujian</Label>
                                        <p class="tx-12 tx-gray-500 pt-0">Disetuji tanpa perbaikan, disetujui dengan perbaikan dan Tidak disetujui/mengulang</p>
                                        <div class="form-group mb-0 justify-content-end">
                                            <div class="checkbox">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label mt-1">Disetuji tanpa perbaikan</label>
                                                </div>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                                    <label for="checkbox-3" class="custom-control-label mt-1">Disetuji dengan perbaikan</label>
                                                </div>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                                    <label for="checkbox-4" class="custom-control-label mt-1">Tidak disetujui/mengulang</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <Label class="form-lable">Jenis Ujian</Label>
                                            <p class="tx-12 tx-gray-500 pt-0">Sidang Pertama dan Sidang Ulang</p>
                                            <div class="form-group mb-0 justify-content-end">
                                                <div class="checkbox">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                                        <label for="checkbox-2" class="custom-control-label mt-1">Sidang Pertama</label>
                                                    </div>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                                        <label for="checkbox-3" class="custom-control-label mt-1">Sidang Ulang</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-xl-12">
                                                <table class="table">
                                                    <tr>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 1</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Pembimbing 2</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Penguji 1</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Penguji 2</span></th>
                                                        <th style="text-align: center; vertical-align: middle;"><span>Penguji 3</span></th>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center; vertical-align: middle;">Ach. Dafid, ST., MT.<p class="mb-0 tx-11 text-muted">
                                                                <span class="text-success ms-2">Ditandatangani</span> /
                                                                <span class="text-danger ms-2">Ditandatangani</span>
                                                            </p>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">Dr. Budi Dwi Satoto, ST., M.Kom.<p class="mb-0 tx-11 text-muted">
                                                                <span class="text-success ms-2">Ditandatangani</span> /
                                                                <span class="text-danger ms-2">Ditandatangani</span>
                                                            </p>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">Ach. Dafid, ST., MT.<p class="mb-0 tx-11 text-muted">
                                                                <span class="text-success ms-2">Ditandatangani</span> /
                                                                <span class="text-danger ms-2">Ditandatangani</span>
                                                            </p>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">Ach. Dafid, ST., MT.<p class="mb-0 tx-11 text-muted">
                                                                <span class="text-success ms-2">Ditandatangani</span> /
                                                                <span class="text-danger ms-2">Ditandatangani</span>
                                                            </p>
                                                        </td>
                                                        <td style="text-align: center; vertical-align: middle;">Ach. Dafid, ST., MT.<p class="mb-0 tx-11 text-muted">
                                                                <span class="text-success ms-2">Ditandatangani</span> /
                                                                <span class="text-danger ms-2">Ditandatangani</span>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
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