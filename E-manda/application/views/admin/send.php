
<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-address-book"></i> Data User</h1>	
</div>

<?= $this->session->flashdata('message'); ?>

<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>

<div class="card shadow mb-4">
<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Kirim Notifikasi</h6>
    </div>
    <br>

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="<?= base_url('assets/')?>img/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Terhubung dengan <strong>WhatsApp</strong></h3>
              <p class="mb-4">Kirim notifikasi kepada para user E-MANDA.</p>
            </div>
            <form autocomplete="off" action="Send/send_notif" method="POST">

            <div class="form-group">
            <div class="input Nama"><label for="nama">Masukkan Nama</label><input list="data_user" name="nama" id="nama" type="text" class="form-control" id="nama" placeholder="Muhammad Rizxxxxx" onchange="return autofill();" required /></div>
            </div>


            <div class="form-group">
            <div class="input Nomer"><label for="whatsapp">Masukkan Nomor</label><input name="no_whatsapp" type="text" class="form-control" id="no_whatsapp" placeholder="0812345xxxxxxxxxx" required /></div>
            </div>

            <div class="form-group">
            <div class="input File"><label for="file">Masukkan File</label><input name="file" type="file" class="form-control" id="file" required /></div>
            </div>

            <div class="form-group">
            <div class="submit"><button type="submit" name="submit" id="btn-wa" class="btn btn-info float-right ">Send</button></div>
            <div class="reset"><button type="reset" name="reset" id="btn-reset" class="btn btn-danger float-left ">Reset</button></div>
            </div>

            
              
            </form>

            

            <datalist id="data_user">
            <?php
							$no=1;
                            foreach ($list as $data => $value) {
						    echo "<option class='option' value='".$value->nama."'>".$value->nama."</option>";
                            
							?>

               <?php
               $no++;
                }
                ?>
             
            </datalist> 

            <script>
              function autofill(){
                var nama =document.getElementById('nama').value;
                $.ajax({
                          url:"<?php echo base_url();?>carinohp",
                          data:'&nama='+nama,
                          success:function(data){
                            var hasil = JSON.parse(data);

                      $.each(hasil, function(key,val){
                        document.getElementById('nama').value=val.nama;
                        document.getElementById('no_whatsapp').value=val.no_whatsapp;

                      });
                          }
                });
              }
            </script>

            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
<br>
  </div>

  
  <?php
$this->load->view('layouts/footer_admin');
?>