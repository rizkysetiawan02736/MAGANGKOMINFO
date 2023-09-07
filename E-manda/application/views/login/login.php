<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Login E-MANDA</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet" />
		<link rel="shortcut icon" href="<?= base_url('assets/')?>img/emandaku.svg" type="image/x-icon">
		<link rel="icon" href="<?= base_url('assets/')?>img/emandaku.svg" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="bg-gradient-success">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand text-success" style="float: left; margin-left: -200pt;" href="<?= base_url('')?>"> <img class="me-3" src="<?= base_url('assets/')?>img/amndari.png" alt="" width="100" height="100"/></a>
            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row d-plex justify-content-between mt-5">
                <div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
										<?php $error=$this->session->flashdata('message');
										if($error) {?>
										<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>                    
										</div>
										<?php }?> 

                                        <form class="user" action="<?php echo site_url('Login/login'); ?>" method="post">
                                            <div class="form-group">
                                                <input required autocomplete="off" type="text" class="form-control form-control-user" id="exampleInputUser" placeholder="Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-success btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                        </form>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="d-plex justify-content-between mt-4">
                                            <center style = "font-family: calibri; font-size:14pt; color:#ffff;">Belum memiliki akun?<a style="color:#b0c4de"href="<?= base_url(); ?>daftar"> Daftar di sini</a> </center>
                                        </div>

                                        <a href="<?= base_url(); ?>">
                                        <button type="button" class="btn btn-primary btn-floating">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                        </svg>
                                        </button>
                                        </a>
                </div>

				
				<div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                    <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                        <div class="text-justify card-body p-0">
                            <h4 style="font-weight: 800;">Aplikasi Manajemen Agenda</h4>
                            <p class="pt-4">
                                Aplikasi E-MANDA bertujuan untuk membantu penjadwalan agenda pimpinan Bupati atau Kepala OPD.
                            </p>
                            <p>
                                Dengan adanya aplikasi ini,  penjadwalan agenda Bupati atau Kepala OPD diharapkan akan menjadi lebih mudah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>
    </body>
</html>


