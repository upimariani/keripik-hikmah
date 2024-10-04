<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<?php
	$user = $this->db->query("SELECT COUNT(id_user) as jml FROM `user`")->row();
	$reseller = $this->db->query("SELECT COUNT(id_reseller) as jml FROM `reseller`")->row();
	$produk = $this->db->query("SELECT COUNT(id_bj) as jml FROM `bahan_jadi`")->row();
	$bb = $this->db->query("SELECT COUNT(id_bb) as jml FROM `bahan_baku`")->row();
	?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">User</span>
							<span class="info-box-number">
								<?= $user->jml ?>
								<small>akun</small>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Reseller Regist</span>
							<span class="info-box-number"><?= $reseller->jml ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Produk</span>
							<span class="info-box-number"><?= $produk->jml ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Bahan Baku</span>
							<span class="info-box-number"><?= $bb->jml ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Bahan Baku</h3><br>
							<small>Jika stok kurang dari 10 maka akan menerima notifikasi segera melakukan pemesanan!</small>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Bahan Baku</th>
										<th>Stok</th>
										<th>Harga</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$bb = $this->db->query("SELECT * FROM `bahan_baku`")->result();
									foreach ($bb as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_bb ?> <span class="badge badge-warning"><?= $value->keterangan ?></span></td>

											<td><?= $value->stok ?>
												<?php
												if ($value->stok <= 10) {
												?>
													<span class="badge badge-danger">Bahan Baku segera melakukan pemesanan!</span>
												<?php
												} else {
												?>
													<span class="badge badge-success">Stok Bahan Baku aman!</span>
												<?php
												}
												?>
											</td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
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
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Produk Keripik Pedas Hikmah / Bahan Jadi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama Produk</th>
										<th>Stok</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$bj = $this->db->query("SELECT * FROM `bahan_jadi`")->result();
									foreach ($bj as $key => $value) {
									?>
										<tr>
											<td>
												<?= $value->nama_bj ?> <span class="badge badge-success"><?= $value->keterangan ?></span></td>


											<td><?= $value->stok ?>
												<?php
												if ($value->stok <= 10) {
												?>
													<span class="badge badge-danger">Segera melakukan update stok!</span>
												<?php
												} else {
												?>
													<span class="badge badge-success">Stok Aman!</span>
												<?php
												}
												?>
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
			</div>

		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
