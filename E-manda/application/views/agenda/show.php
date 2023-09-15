<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar-alt"></i> Data Agenda</h1>


	
	<a href="<?= base_url(); ?>tabelagendaadmin" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>

	
	

	

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Detail Data Agenda</h6>
    </div>
	
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				
				<tr>
					<th class="bg-light">Nama Agenda</th>
					<td><?php echo $data->nama_agenda?></td>
				</tr>
				<tr>
					<th class="bg-light">Tanggal</th>
					<td><?php echo $data->tanggal?></td>
				</tr>
				<tr>
					<th class="bg-light">Jam</th>
					<td><?php echo $data->jam?></td>
				</tr>
                <tr>
					<th class="bg-light">Tempat</th>
					<td><?php echo $data->tempat?></td>
				</tr>
                <tr>
					<th class="bg-light">Leading Sector</th>
					<td><?php echo $data->leading_sector?></td>
				</tr>
                
                <tr>
					<th class="bg-light">Keterangan</th>
					<td><?php echo $data->keterangan?></td>
				</tr>
		
		
			</div>

				
	</div>



</div>









<?php $this->load->view('layouts/footer_admin'); ?>