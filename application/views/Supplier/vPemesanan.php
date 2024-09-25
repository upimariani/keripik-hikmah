<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>
						Pemesanan Bahan Baku
						<small>Supplier</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pemesanan Bahan Baku</li>
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
				<div class="col-12 col-sm-12">
					<div class="card card-warning card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active btn-danger" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan Belum Bayar</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-warning" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Menunggu Konfirmasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-info" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Pesanan Dikirim</a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-success" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-three-tabContent">
								<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>Nama Supplier</th>
													<th>Tanggal Transaksi</th>
													<th>Total Bayar</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '0') {
												?>
														<tr>
															<td><?= $value->nama_user ?></td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<?php
															//bahan baku yang dipesan
															$bb = $this->db->query("SELECT * FROM `transaksi_bb` JOIN detail_transaksibb ON transaksi_bb.id_tranbb=detail_transaksibb.id_tranbb JOIN bahan_baku ON bahan_baku.id_bb=detail_transaksibb.id_bb WHERE transaksi_bb.id_tranbb='" . $value->id_tranbb . "'")->result();
															foreach ($bb as $key => $value) {
															?>
																<td><?= $value->nama_bb ?> (<?= $value->qty_bb ?>x)</td>
															<?php
															}
															?>

															<td><?= $value->time_update ?></td>
														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>Nama Supplier</th>
													<th>Tanggal Transaksi</th>
													<th>Total Bayar</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '1') {
												?>
														<tr>
															<td><?= $value->nama_user ?></td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span><br>
																	<a href="<?= base_url('asset/bayar-bb/' . $value->bukti_bayar) ?>">Bukti Pembayaran</a><br>
																	<a href="<?= base_url('Supplier/cPemesanan/konfirmasi/' . $value->id_tranbb) ?>" class="btn btn-warning">Konfirmasi Pemesanan</a>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<?php
															//bahan baku yang dipesan
															$bb = $this->db->query("SELECT * FROM `transaksi_bb` JOIN detail_transaksibb ON transaksi_bb.id_tranbb=detail_transaksibb.id_tranbb JOIN bahan_baku ON bahan_baku.id_bb=detail_transaksibb.id_bb WHERE transaksi_bb.id_tranbb='" . $value->id_tranbb . "'")->result();
															foreach ($bb as $key => $value) {
															?>
																<td><?= $value->nama_bb ?> (<?= $value->qty_bb ?>x)</td>
															<?php
															}
															?>

															<td><?= $value->time_update ?></td>
														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>Nama Supplier</th>
													<th>Tanggal Transaksi</th>
													<th>Total Bayar</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '2') {
												?>
														<tr>
															<td><?= $value->nama_user ?></td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<?php
															//bahan baku yang dipesan
															$bb = $this->db->query("SELECT * FROM `transaksi_bb` JOIN detail_transaksibb ON transaksi_bb.id_tranbb=detail_transaksibb.id_tranbb JOIN bahan_baku ON bahan_baku.id_bb=detail_transaksibb.id_bb WHERE transaksi_bb.id_tranbb='" . $value->id_tranbb . "'")->result();
															foreach ($bb as $key => $value) {
															?>
																<td><?= $value->nama_bb ?> (<?= $value->qty_bb ?>x)</td>
															<?php
															}
															?>

															<td><?= $value->time_update ?></td>
														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>Nama Supplier</th>
													<th>Tanggal Transaksi</th>
													<th>Total Bayar</th>
													<th>Status Pemesanan</th>
													<th>Pemesanan</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ($pemesanan as $key => $value) {
													if ($value->status == '3') {
												?>
														<tr>
															<td><?= $value->nama_user ?></td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<?php
															//bahan baku yang dipesan
															$bb = $this->db->query("SELECT * FROM `transaksi_bb` JOIN detail_transaksibb ON transaksi_bb.id_tranbb=detail_transaksibb.id_tranbb JOIN bahan_baku ON bahan_baku.id_bb=detail_transaksibb.id_bb WHERE transaksi_bb.id_tranbb='" . $value->id_tranbb . "'")->result();
															foreach ($bb as $key => $value) {
															?>
																<td><?= $value->nama_bb ?> (<?= $value->qty_bb ?>x)</td>
															<?php
															}
															?>

															<td><?= $value->time_update ?></td>
														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>

			</div>

			<!-- /.card -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
