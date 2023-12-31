<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-briefcase"></i> Penugasan</h1>	

	<a href="<?= base_url(); ?>tabelagendaadmin" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?> 

<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Penugasan</h6>
    </div>
	
	<?php echo form_open_multipart('Agenda/tambah_penugasan')?>
		<div class="card-body">
			<div class="row">
                

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama User</label>
					<div class="input Nama"><input autocomplete="off" list="data_user" name="nama" id="nama" type="text" class="form-control" id="nama" placeholder="Muhammad Rizxxxxx" onchange="return autofill();" required /></div>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nomor Whatsapp</label>
					<input autocomplete="off" type="text" id="no_whatsapp" name="no_whatsapp" required class="form-control" id="no_whatsapp" placeholder="0812345xxxxx"  />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Agenda</label>
					<input autocomplete="off" type="text" name="nama_agenda" required class="form-control" value="<?php echo $data->nama_agenda?>"/>
				</div>

				<div class="form-group col-md-6">
					<!-- <label class="font-weight-bold">ID User</label> -->
					<input autocomplete="off" type="hidden" id="id_user" name="id_user" required class="form-control" />
				</div>

				
				
				<div class="form-group col-md-6">
					<!-- <label class="font-weight-bold">ID Agenda</label> -->
					<input autocomplete="off" type="hidden" id="id_agenda" name="id_agenda" required class="form-control" value="<?php echo $data->id_agenda?>" />
				</div>
				
				<!-- <div class="form-group col-md-6">
					<label class="font-weight-bold">Disposisi</label>
					<input autocomplete="off" type="text" name="disposisi" class="form-control" />
				</div> -->

				

				
				
            			
			</div>
		</div>
		
		<div class="card-footer text-right" >
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-paper-plane"></i> Kirim</button>
            <button type="reset" class="btn btn-danger float-left"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
		
		<br>
		<br>
	<?php echo form_close() ?>

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
                          url:"<?php echo base_url();?>cariiduser",
                          data:'&nama='+nama,
                          success:function(data){
                            var hasil = JSON.parse(data);

                      $.each(hasil, function(key,val){
                        document.getElementById('nama').value=val.nama;
                        document.getElementById('id_user').value=val.id_user;
						document.getElementById('no_whatsapp').value=val.no_whatsapp;

                      });
                          }
                });
              }
            </script>

</div>



<?php $this->load->view('layouts/footer_admin'); ?>