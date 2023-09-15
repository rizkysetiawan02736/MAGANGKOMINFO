<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-briefcase"></i> Data Penugasan</h1>

    
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> List Penugasan</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Tanggal</th>
                        <th>Agenda</th>
						<th>Bertugas</th>
						<th>Disposisi</th>
                        <th width="15%">Aksi</th>
						
						
						<!-- <th width="15%">Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($list as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->tanggal ?></td>
                        <td><?php echo $value->nama_agenda ?></td>
						<td><?php echo $value->nama ?></td>
						<td><?php echo $value->disposisi ?></td>
                        <td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('hapus-penugasan/'.$value->id_penugasan)?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>
						
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