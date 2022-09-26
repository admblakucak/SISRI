<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> SISRI - Login</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php base_url() ?>/assets/img/brand/logoutm.png" type="image/x-icon" />

    <!-- Icons css -->
    <link href="<?php base_url() ?>/assets/css/icons.css" rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="<?php base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--  Right-sidemenu css -->
    <link href="<?php base_url() ?>/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="<?php base_url() ?>/assets/plugins/perfect-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="<?php base_url() ?>/assets/css/sidemenu.css">

    <!--- Style css --->
    <link href="<?php base_url() ?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php base_url() ?>/assets/css/boxed.css" rel="stylesheet">
    <link href="<?php base_url() ?>/assets/css/dark-boxed.css" rel="stylesheet">

    <!--- Dark-mode css --->
    <link href="<?php base_url() ?>/assets/css/style-dark.css" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="<?php base_url() ?>/assets/css/skin-modes.css" rel="stylesheet" />

    <!--- Animations css-->
    <link href="<?php base_url() ?>/assets/css/animate.css" rel="stylesheet">

</head>

<div class="container">
    <div class="row mt-4">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card ">
                <div class="card-header pb-0">
                    <div class="container h-custom">
                        <div class="row mt-4">
                            <div class="col-xl-12 pb-4">
                                <img src="<?php base_url() ?>/assets/img/logosisri.png" alt="">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-12 pb-12">
                                <form action="<?php base_url() ?>/proses_login" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-4">
                                        <input class="form-control" placeholder="Password Baru" type="password" name="password baru">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" placeholder="Verifikasi Password" type="password" name="verifikasi password">
                                    </div>
                                    <div class="text-center mt-4 pt-3 pb-4">
                                        <button type="button" class="btn btn-primary" style="padding-left: 1.5rem; padding-right: 1.5rem;">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>