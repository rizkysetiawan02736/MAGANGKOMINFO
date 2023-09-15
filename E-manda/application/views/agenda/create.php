<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar-alt"></i> Data Agenda</h1>	
	<a href="<?= base_url(); ?>tabelagendaadmin" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?> 

<script src="<?php echo base_url(); ?>assets/js/ajax.js"></script>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Agenda</h6>
    </div>
	
	<?php echo form_open_multipart('Agenda/store')?>
		<div class="card-body">
			<div class="row">
                

				<!-- <div class="form-group col-md-6">
					<label class="font-weight-bold">Nama User</label>


					<div class="input Nama"><input autocomplete="off" list="data_user" name="nama" id="nama" type="text" class="form-control" id="nama" placeholder="Muhammad Rizxxxxx" onchange="return autofill();" required /></div>
				</div> -->

				<!-- <div class="form-group col-md-6">
					<label class="font-weight-bold">ID User</label>
					<input autocomplete="off" type="number" id="id_user" name="id_user" required class="form-control" />
				</div> -->

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Agenda</label>
					<input autocomplete="off" type="text" name="nama_agenda" required class="form-control" />
				</div>
				
				<div class="form-group col-md-6">  
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jam</label>
					<input autocomplete="off" type="time" name="jam" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tempat</label>
					<input autocomplete="off" type="text" name="tempat" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Leading Sector</label>
					<input autocomplete="off" type="text" name="leading_sector" required class="form-control" />
				</div>

				<!-- <div class="form-group col-md-6">
					<label class="font-weight-bold">Disposisi</label>
					<input autocomplete="off" type="text" name="disposisi" class="form-control" />
				</div> -->

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan</label>
					<input autocomplete="off" type="text" name="keterangan" class="form-control" />
				</div>
				
            			
			</div>
		</div>
		<div class="card-footer text-right" >
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger float-left"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
		<br>
		<br>
	<?php echo form_close() ?>

	<!-- <datalist id="data_user">
            <?php
							$no=1;
                            foreach ($list as $data => $value) {
						    echo "<option class='option' value='".$value->nama."'>".$value->nama."</option>";
                            
							?>

               <?php
               $no++;
                }
                ?>
             
            </datalist>  -->

	<!-- <script>
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

                      });
                          }
                });
              }
            </script> -->

</div>



<?php $this->load->view('layouts/footer_admin'); ?>