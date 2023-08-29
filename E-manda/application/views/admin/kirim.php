<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Email</title>
    <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
</head>
<?= $this->session->flashdata('message'); ?>
<body>

    
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
    <div class="modal-body">
        <div class="h5 modal-title text-center">
            <h4 class="mt-2">
                <div style="color:#ffffff";>Kirim Email Kepada Calon Pegawai</div>
                
            </h4>
        </div>
        
        
            <form action="kirim_proses" method="post">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="modal-title" style="color:#ffffff">Username</div>
                        <div class="position-relative form-group"><input type="text" name="username" class="form-control" placeholder="Isikan Username"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="modal-title" style="color:#ffffff">Password</div>
                        <div class="position-relative form-group"><input type="text" name="password" class="form-control" placeholder="Isikan Password"></div>
                    </div>
                    <div class="col-md-12">
                    <select class="form-control" name="email" required>
							<option class="option" value="title" >Email</option>
							<?php
							$no=1;
                            foreach ($list as $data => $value) {
						    echo "<option class='option' value='".$value->email."'>".$value->email."</option>";
                            
							?>

                            <?php
                            $no++;
                             }
                             ?>
						</select>
						<span class="select-btn">
						  	<i class="zmdi zmdi-chevron-down"></i>
						</span>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-12">

                    <div style=padding-bottom:20px; class="float-left">
                    <form ><a style=color:#ffffff; href="<?= base_url(); ?>/Lihat_cv" class="btn btn-warning btn-lg" type="submit">Kembali</a></form>
                    </div>
                    <div  class="float-right">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg" style="color:#ffffff">Kirim</button>
                    </div>
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
    
    <script type="text/javascript" src="<?= base_url(); ?>assets/scripts/main.07a59de7b920cd76b874.js"></script>
</body>
</html>