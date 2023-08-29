<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-briefcase"></i> Data Agenda</h1>

    <a href="<?= base_url('Agenda/create'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Lowongan Pekerjaan</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Agenda</th>
						<th>Tanggal</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($list as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?php echo $value->nama_agenda ?></td>
						<td><?php echo $value->tanggal ?></td>
						<td>
                            <div class="btn-group" role="group">
                            <a data-toggle="modal" title="Edit Data" href="#editsk<?= $value->id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Agenda/destroy/'.$value->id) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>
                    <!-- Modal -->
					<div class="modal fade" id="editsk<?= $value->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?= $value->nama_agenda ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Agenda/update/'.$value->id) ?>
									<?= form_hidden('id', $value->id) ?>
									<div class="modal-body">
										<div class="form-group">
											<label for="nama_agenda" class="font-weight-bold">Nama Agenda</label>
											<input type="text" id="nama_agenda" autocomplete="off" class="form-control" value="<?= $value->jobname ?>" name="jobname" required>
										</div>
										<div class="form-group">
											<label for="requirement" class="font-weight-bold">Tanggal</label>
											<input type="text" autocomplete="off" id="tanggal" name="tanggal" class="form-control" value="<?= $value->tanggal ?>" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
                <?php
					$no++;
                }
				?>

					
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php $this->load->view('layouts/footer_admin'); ?>