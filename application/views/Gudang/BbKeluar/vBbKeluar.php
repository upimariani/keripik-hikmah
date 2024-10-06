<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bahan Baku Keluar</h1>
					<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#modal-default">
						<i class="fa fa-bell"></i>Tambah Pemesanan Bahan Baku
					</button>
					<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
							<form action="<?= base_url('Gudang/cBbKeluar/create') ?>" method="POST">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Masukkan Data Bahan Baku Keluar</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label for="exampleInputEmail1">Nama Bahan Baku</label>
											<select class="form-control" name="bb" id="bb_keluar" required>
												<option value="">Pilih Bahan Baku</option>
												<?php
												foreach ($bb as $key => $value) {
													if ($value->stok != '0') {
												?>
														<option data-stok="<?= $value->stok ?>" value="<?= $value->id_bb ?>"><?= $value->nama_bb ?> | Stok. <?= $value->stok ?></option>
												<?php
													}
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Quantity Tersedia</label>
											<input type="text" name="qty_tersedia" class="stok form-control" readonly>

										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Tanggal Keluar</label>
											<input type="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control" required>

										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Quantity</label>
											<input type="number" name="qty" class="form-control" required>

										</div>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-info">Save changes</button>
									</div>
								</div>
							</form>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Bahan Baku Keluar</li>
					</ol>
				</div>
			</div>
			<?php if ($this->session->userdata('success')) {
			?>
				<div class="callout callout-success">
					<h5>Sukses!</h5>

					<p><?= $this->session->userdata('success') ?></p>
				</div>
			<?php
			} ?>
			<?php if ($this->session->userdata('error')) {
			?>
				<div class="callout callout-danger">
					<h5>Gagal!</h5>

					<p><?= $this->session->userdata('error') ?></p>
				</div>
			<?php
			} ?>
		</div><!-- /.container-fluid -->

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Bahan Baku Keluar</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Tanggal Keluar</th>
										<th>Nama Bahan Baku</th>
										<th>Quantity digunakan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($bb_keluar as $key => $value) {
									?>
										<tr>
											<td><?= $value->tgl_keluar ?></td>
											<td><?= $value->nama_bb ?></td>
											<td><?= $value->qty_keluar ?></td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#perbaharui<?= $value->id_bb_keluar ?>">
														Perbaharui
													</button>
													<a href="<?= base_url('Gudang/cBbKeluar/delete/' . $value->id_bb_keluar) ?>" class="btn btn-danger">Hapus</a>
												</div>
											</td>
										</tr>
									<?php
									}
									?>


								</tbody>

							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<?php
foreach ($bb_keluar as $key => $value) {
?>
	<div class="modal fade" id="perbaharui<?= $value->id_bb_keluar ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Gudang/cBbKeluar/update/' . $value->id_bb_keluar) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Masukkan Data Bahan Baku Keluar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Bahan Baku</label>
							<select class="form-control" name="bb" required>
								<option value="">Pilih Bahan Baku</option>
								<?php
								foreach ($bb as $key => $item) {
									if ($item->stok != '0') {
								?>
										<option data-stok="<?= $item->stok ?>" value="<?= $item->id_bb ?>" <?php if ($value->id_bb == $item->id_bb) {
																												echo 'selected';
																											} ?>><?= $item->nama_bb ?> | Stok. <?= $item->stok ?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Tanggal Keluar</label>
							<input type="date" name="date" value="<?= $value->tgl_keluar ?>" class="form-control" required>

						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Quantity</label>
							<input type="number" name="qty" value="<?= $value->qty_keluar ?>" class="form-control" required>

						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-info">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php
}
?>
