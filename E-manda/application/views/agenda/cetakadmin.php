<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h2 align="center" style="text-transform:uppercase" class="h3 mb-0 text-gray-800"><i class="fas fa-briefcase"></i> Daftar Agenda</h2>				
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
<br>
    <div class="card-body">
		<div class="table-responsive">
			<table border="1" cellpadding="5" cellspacing="0" class="table table-bordered" id="dataTable" width="100%" cellSpacing="0%">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Agenda</th>
						<th>Tempat</th>
						<th>Leading Sector</th>
						<th>Disposisi</th>
						<th>Keterangan</th>
						
						<!-- <th width="15%">Aksi</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($last as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->tanggal ?></td>
						<td><?php echo $value->jam ?></td>
						<td><?php echo $value->nama_agenda ?></td>
						<td><?php echo $value->tempat ?></td>
						<td><?php echo $value->leading_sector ?></td>
						<td><?php echo $value->disposisi ?></td>
						<td><?php echo $value->keterangan ?></td>
						
						
                <?php
					$no++;
                }
				?>

					
				</tbody>
			</table>
		</div>
	</div>
</div>

