<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar-alt"></i> Data Agenda</h1>

	<a href="<?= base_url(); ?>tabelagendaadmin" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Agenda</h6>
    </div>
	
	<?php echo form_open('Agenda/update/'.$Agenda->id_agenda); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_agenda', $Agenda->id_agenda) ?>
				
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Agenda</label>
					<input autocomplete="off" type="text" name="nama_agenda" value="<?php echo $Agenda->nama_agenda ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal</label>
					<input autocomplete="off" type="date" name="tanggal" value="<?php echo $Agenda->tanggal ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jam</label>
					<input autocomplete="off" type="time" name="jam" value="<?php echo $Agenda->jam ?>" required class="form-control"/>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tempat</label>
					<input autocomplete="off" type="text" name="tempat" value="<?php echo $Agenda->tempat ?>" required class="form-control"/>
				</div>
				
                <div class="form-group col-md-6">
					<label class="font-weight-bold">Leading Sector</label>
					<input autocomplete="off" type="text" name="leading_sector" value="<?php echo $Agenda->leading_sector ?>" required class="form-control"/>
				</div>

                

                <div class="form-group col-md-6">
					<label class="font-weight-bold">Keterangan</label>
					<input autocomplete="off" type="text" name="keterangan" value="<?php echo $Agenda->keterangan ?>" required class="form-control"/>
				</div>

			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>