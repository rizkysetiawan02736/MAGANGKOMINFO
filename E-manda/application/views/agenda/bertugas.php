<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calendar-alt"></i> User Bertugas</h1>
	<a href="<?= base_url(); ?>tabelagendaadmin" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> List Bertugas</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Bertugas</th>
						<th>Disposisi</th>
					
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($lust as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->nama ?></td>
						<td><?php echo $value->disposisi ?></td>
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