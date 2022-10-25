<?php

use CodeIgniter\Images\Image;
?>
<?= $this->extend('Template/content') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">Ganti Password</div>
                <div class="table-responsive border-top userlist-table"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="password">
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <div class="reset">
                                    <input class="form-control" placeholder="" type="password" value="thisismypassword">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 col-lg-9 col-xl-2 offset-xl-10 pb-2">
                            <div class="btn-list">
                                <div class="row mb-4">
                                    <div class="col-12 pb-2">
                                        <a aria-controls="multiCollapseExample1 multiCollapseExample2" aria-expanded="false" class="btn ripple btn-light mb-3 mb-xl-0" href=".multi-collapse" data-bs-toggle="collapse" role="button">Ganti Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="mt-4">
                                    <form action="form-validation.html" data-parsley-validate="">
                                        <div class="row row-sm">
                                            <div class="col-4">
                                                <div class="form-group mg-b-0">
                                                    <label class="form-label">Password Lama</label>
                                                    <input class="form-control" name="firstname" placeholder="Isikan Password Lama" required="" type="password">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Password Baru</label>
                                                    <input class="form-control" name="lastname" placeholder="Isikan Password Baru" required="" type="password">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label">Verifikasi Password</label>
                                                    <input class="form-control" name="lastname" placeholder="Isikan Password Baru" required="" type="password">
                                                </div>
                                            </div>
                                            <div class="col-12"><button class="btn btn-success pd-x-20 mg-t-10" type="submit">Update Password</button>
                                                <a aria-controls="multiCollapseExample1 multiCollapseExample2" aria-expanded="false" class="btn btn-dark pd-x-20 mg-t-10" href=".multi-collapse" data-bs-toggle="collapse" role="button" class="col-md-10 col-lg-9 col-xl-2 offset-xl-10 pt-4">Keluar</a>
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