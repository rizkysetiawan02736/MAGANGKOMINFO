<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Agenda</h1>

    <a href="<?= base_url('Cetak'); ?>" class="btn btn-info btn-icon-split"><span class="icon text-white-50"><i class="fas fa-download"></i></span>
		<span class="text">Print</span>
	</a>
	
	
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Agenda Harian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
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
						foreach ($hasil as $data => $value) {
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

<?php
$this->load->view('layouts/footer_admin');
?>