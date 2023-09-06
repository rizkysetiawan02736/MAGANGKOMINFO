<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Register E-MANDA</title>
            <link href="<?= base_url(); ?>assets/css/main.css" rel="stylesheet">
            
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    </head>
    <?= $this->session->flashdata('message'); ?>
<body>
<div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                        <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content" style="background:#1cc88a;" >
                                <div class="modal-body">
    <?php echo form_open_multipart('Register/store')?>

    <div class="h5 modal-title text-center">
        <h4 class="mt-2">
            <div for="varchar" style="color:#ffffff;">Register</div>
        </h4>

        
            <div class="form-row">
            <div class="col-md-12">

            <div class="form-group">
                <label for="email" class="float-left" style="color:#ffffff;">E-mail</label>
                <div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="float-left" style="color:#ffffff;">Username</label>
                <div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pass" class="float-left" style="color:#ffffff;">Password</label>
                <div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="float-left" style="color:#ffffff;">Nama Lengkap</label>
                <div>
                <input style="text-transform:uppercase" type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                </div>
            </div>

            <div class="form-group">
                <label for="jabatan" class="float-left" style="color:#ffffff;">Jabatan</label>
                <div>
                <input style="text-transform:uppercase" type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
                </div>
            </div>

            <div class="form-group">
                <label for="wa" class="float-left" style="color:#ffffff;">Nomor Whatsapp</label>
                <div>
                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" placeholder="Nomor Whatsapp" required>
                </div>
            </div>

            <div class="form-group">
            <label for="Manufacturer" class="float-left" style="color:#ffffff;"> User Level : </label>
            <select id="cmbUL" name="privilege" class="float-right" required>
               <option value="">Pilih</option>
               <option value="2">2</option>
            </select>
            </div>
            <br>
            <br>
            

            
            <button type="submit" class="btn btn-info float-right "> Simpan</button>
            <button type="reset" class="btn btn-danger float-left "> Reset</button>
            
            


                            <!-- <div class="form-group">
                            <label for="cv" class="float-left" style="color:#ffffff;">Curriculum Vitae (CV)</label>
                            <input type="file" name="filename" class="form-control" size="20">
                            </div> -->

                        
                        
        
                        
                        <?php echo form_close() ?>
            </div>

                            
                           
                    </div>
            </div>
    </div>
    <br>
    
</div>

</div>
                                        <div class="d-plex justify-content-between mt-4">
                                            <center style = "font-family: calibri; font-size:14pt; color:#00000;">Sudah memiliki akun?<a style="color:#37517e"href="<?= base_url(); ?>masuk"> Login di sini</a> </center>
                                        </div>
</div>
</div>
</div>
</div>
</div>



</body>
</html>
