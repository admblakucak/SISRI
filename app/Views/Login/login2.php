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
        <div class="col">
            <div class="card pb-4">
                <section class="vh-90">
                    <div class="container h-custom">
                        <div class="row">
                            <div class="col-md-9 col-lg-4 col-xl-5 pb-2">
                                <img src="<?php base_url() ?>/assets/img/logosisri.png" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 pb-2">
                                <a href=""><img src="<?php base_url() ?>/assets/img/ft.png" class="img-fluid" alt="Sample image"></a>
                            </div>
                            <div class="col-md-10 col-lg-9 col-xl-4 offset-xl-1 pt-4">
                                <div class="row mb-4">
                                    <div class="col-12 pb-2">
                                        <button class="btn btn-main-primary btn-block" type="submit">SIAKAD UTM</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <?= session()->getFlashdata('message'); ?>
                                        <form action="<?php base_url() ?>/proses_login" method="POST" enctype="multipart/form-data">
                                            <div class="form-group mb-4">
                                                <label>Username</label>
                                                <input class="form-control" placeholder="NIM/NIP/EMAIL" type="text" name="username">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Password" type="password" name="password">
                                            </div>
                                            <div class="main-signin-footer mt-2">
                                                <p><a href="/password">Lupa Password?</a></p>
                                                <!-- <p>Don't have an account? <a href="page-signup.html">Buat Akun</a></p> -->
                                            </div>
                                            <div class="text-left text-lg-start mt-4 pt-2 pb-3">
                                                <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-auto">
                                <span>Copyright © 2022 <a href="http://teknik.trunojoyo.ac.id/">FT-UTM</a>.
                                    All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>