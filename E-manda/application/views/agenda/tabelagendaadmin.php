<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar-alt"></i> Data Agenda</h1>

	<div>
	<div class="float-left">	
    <a  href="<?= base_url(); ?>tambahagenda" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fa fa-plus"></i></span>
		<span class="text">Tambah Agenda</span>
	</a>
	</div>
	
	
<div style="margin-left: 10px;" class="dropdown float-right" >
  <button class="btn btn-default btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <i class="fa fa-download"></i> Export
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a class="dropdown-item " href="<?= base_url(); ?>cetakagendaadmin" >PDF</a></li>
    <li><a class="dropdown-item " href="<?= base_url(); ?>cetakexcel">Excel</a></li>
    
  </ul>

</div>
</div>


</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> List Agenda</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Agenda</th>
						<th>Tempat</th>
						<th>Sector</th>
						<th>Keterangan</th>
						<th width="15%">Aksi</th>
						
					
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($agenda_admin as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->tanggal ?></td>
						<td><?php echo $value->jam ?></td>
						<td><?php echo $value->nama_agenda ?></td>
						<td><?php echo $value->tempat ?></td>
						<td><?php echo $value->leading_sector ?></td>
						
						<td><?php echo $value->keterangan ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="<?=base_url('lihat-agenda/'.$value->id_agenda)?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?=base_url('ubah-agenda/'.$value->id_agenda)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('hapus-agenda/'.$value->id_agenda)?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Penugasan" href="<?=base_url('penugasan-agenda/'.$value->id_agenda)?>" class="btn btn-info btn-sm"><i class="fa fa-paper-plane"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Bertugas" href="<?=base_url('tabelbertugas/'.$value->id_agenda)?>" class="btn btn-dark btn-sm"><i class="fa fa-briefcase"></i></a>
							</div>
						</td>
					</tr>	
						
                <?php
					$no++;
                }
				?>
				</tbody>
			</table>
		</div>
	
		
	</div>

		
</div>



<?php
$this->load->view('layouts/footer_admin');
?>