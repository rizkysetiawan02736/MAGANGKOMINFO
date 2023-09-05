<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Agenda</h1>

	
</div>

<?= $this->session->flashdata('message'); ?> 



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Agenda</h6>
    </div>
	
	<?php echo form_open_multipart('Agenda/store')?>
		<div class="card-body">
			<div class="row">
                

				<div class="form-group col-md-6">
					<label class="font-weight-bold">ID User</label>
					<input autocomplete="off" type="number" name="id_user" required class="form-control" />
				</div>

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

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Disposisi</label>
					<input autocomplete="off" type="text" name="disposisi" required class="form-control" />
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan</label>
					<input autocomplete="off" type="text" name="keterangan" required class="form-control" />
				</div>
				
            

                           
				
				
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>





<?php $this->load->view('layouts/footer_admin'); ?>