<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>
						Transaksi Produk
						<small>Reseller</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Transaksi Produk</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<form action="<?= base_url('Pemilik/cLapProduk/cetak') ?>" method="POST">
						<div class="card">
							<div class="card-header">
								<h5>Cetak Laporan Transaksi Produk Selesai</h5>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<?php
										$bulan = $this->db->query("SELECT MONTH(tgl_transaksi) as bulan FROM `transaksi_bj` GROUP BY MONTH(tgl_transaksi)")->result();

										$tahun = $this->db->query("SELECT YEAR(tgl_transaksi) as tahun FROM `transaksi_bj` GROUP BY YEAR(tgl_transaksi)")->result();
										?>
										<div class="form-group">
											<select class="form-control" name="bulan" required>
												<option value="">Pilih Bulan Pemesanan</option>
												<?php
												foreach ($bulan as $key => $value) {
												?>
													<option value="<?= $value->bulan ?>"><?php if ($value->bulan == '1') {
																								echo 'Januari';
																							} else if ($value->bulan == '2') {
																								echo 'Februari';
																							} else if ($value->bulan == '3') {
																								echo 'Maret';
																							} else if ($value->bulan == '4') {
																								echo 'April';
																							} else if ($value->bulan == '5') {
																								echo 'Mei';
																							} else if ($value->bulan == '6') {
																								echo 'Juni';
																							} else if ($value->bulan == '7') {
																								echo 'Juli';
																							} else if ($value->bulan == '8') {
																								echo 'Agustus';
																							} else if ($value->bulan == '9') {
																								echo 'September';
																							} else if ($value->bulan == '10') {
																								echo 'Oktober';
																							} else if ($value->bulan == '11') {
																								echo 'November';
																							} else if ($value->bulan == '12') {
																								echo 'Desember';
																							} ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<select class="form-control" name="tahun" required>
												<option value="">Pilih Tahun Pemesanan</option>
												<?php
												foreach ($tahun as $key => $value) {
												?>
													<option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-success" type="submit"><i class="fas fa-print"></i> Cetak Laporan</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Pemesanan Bahan Baku Selesai</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="example1 table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Transaksi</th>
										<th>Total Pembayaran</th>
										<th>Status</th>
										<th>Produk</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($transaksi as $key => $value) {
										if ($value->status == '3') {
									?>
											<tr>
												<td><?= $no++ ?>.</td>
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
												// bahan baku yang dipesan
												$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
												foreach ($bj as $key => $value) {
												?>
													<td><?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)</td>
												<?php
												}
												?>

											</tr>
									<?php
										}
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
