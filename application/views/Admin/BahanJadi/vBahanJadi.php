<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Produk Keripik Pedas Hikmah</h1>
					<hr>
					<a href="<?= base_url('Admin/cBahanJadi/create') ?>" class="btn btn-app bg-warning">
						<i class="fas fa-tag"></i> Tambah Produk
					</a>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Produk</li>
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

		</div><!-- /.container-fluid -->

	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Produk Keripik Pedas Hikmah / Bahan Jadi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Produk</th>
										<th>Keterangan</th>
										<th>Deskripsi</th>
										<th>Stok</th>
										<th>Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($bj as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_bj ?></td>
											<td><span class="badge badge-success"><?= $value->keterangan ?></span></td>
											<td><?= $value->deskripsi ?></td>
											<td><?= $value->stok ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>

											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning">Menu</button>
													<button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu" role="menu">
														<a class="dropdown-item" href="<?= base_url('Admin/cBahanJadi/delete/' . $value->id_bj) ?>">Hapus</a>
														<a class="dropdown-item" href="<?= base_url('Admin/cBahanJadi/update/' . $value->id_bj) ?>">Perbaharui</a>
													</div>
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