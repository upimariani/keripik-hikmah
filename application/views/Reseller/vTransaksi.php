<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>
						Transaksi Produk <b>Keripik Pedas Hikmah</b>
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
					<div class="card card-info card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
								<?php
								//notifikasi
								$belum_bayar = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='0' AND id_reseller='" . $this->session->userdata('id_reseller') . "'")->row();
								$menunggu = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='1' AND id_reseller='" . $this->session->userdata('id_reseller') . "'")->row();
								$dikirim = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='2' AND id_reseller='" . $this->session->userdata('id_reseller') . "'")->row();
								$selesai = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='3' AND id_reseller='" . $this->session->userdata('id_reseller') . "' AND stat_res='0'")->row();
								?>
								<li class="nav-item">
									<a class="nav-link active btn-danger" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan Belum Bayar <span class="badge badge-warning"><?= $belum_bayar->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-warning" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Menunggu Konfirmasi <span class="badge badge-danger"><?= $menunggu->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-info" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Pesanan Dikirim <span class="badge badge-success"><?= $dikirim->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-success" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai <span class="badge badge-info"><?= $selesai->jml ?></span></a>
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
													<th>No</th>
													<th>Tanggal Transaksi</th>
													<th>Total Pembayaran</th>
													<th>Status</th>
													<th>Produk</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($transaksi as $key => $value) {
													if ($value->status == '0') {
												?>
														<tr>
															<td><?= $no++ ?>.</td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<?= form_open_multipart('Reseller/cTransaksi/bayar/' . $value->id_tranbj) ?>
																	<span class="badge badge-danger">Belum Bayar</span>
																	<input class="form-control" name="gambar" type="file" required>
																	<p>BRI : 4329012 <br>
																		Atas Nama : Keripik Hikmah Pedas</p>
																	<button type="submit" class="btn btn-danger mt-2"> <i class="far fa-credit-card"></i> Payment</button>
																	</form>
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
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>
															<td>
																<a href="<?= base_url('Reseller/cTransaksi/delete/' . $value->id_tranbj) ?>" class="btn btn-danger">Hapus Pesanan</a>
																<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default<?= $value->id_tranbj ?>">
																	Perbaharui
																</button>
															</td>
														</tr>

														<!-- /.modal -->
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
													if ($value->status == '1') {
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
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

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
													if ($value->status == '2') {
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
																	<span class="badge badge-info">Pesanan Dikirim</span><br>
																	<a class="btn btn-info" href="<?= base_url('Reseller/cTransaksi/pesanan_diterima/' . $value->id_tranbj) ?>"><i class="fas fa-cart-arrow-down"></i> Pesanan Diterima</a>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

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
									<?php
									$data = array(
										'stat_res' => '1'
									);
									$this->db->where('status=3');
									$this->db->where('id_reseller', $this->session->userdata('id_reseller'));
									$this->db->update('transaksi_bj', $data);

									?>
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
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

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
<?php
foreach ($transaksi as $key => $value) {
	if ($value->status == '0') {
?>
		<div class="modal fade" id="modal-default<?= $value->id_tranbj ?>">
			<div class="modal-dialog modal-lg">
				<form action="<?= base_url('Reseller/cTransaksi/update/' . $value->id_tranbj) ?>" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Perbaharui Jumlah Pembelian</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<table class="table">
								<tr>
									<th>No</th>
									<th>Nama Produk</th>
									<th>Quantity</th>
									<th>Subtotal</th>
									<th>Perbaharui</th>
								</tr>
								<?php
								$dt_produk = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
								foreach ($dt_produk as $key => $item) {
								?>
									<tr>
										<td><?= $key + 1 ?>.</td>
										<td><?= $item->nama_bj ?></td>
										<td><?= $item->qty_bj ?></td>
										<td>Rp. <?= number_format($item->qty_bj * $item->harga)  ?></td>
										<td><input class="form-control" type="number" min='1' value="<?= $item->qty_bj ?>" name="qty<?= $key + 1 ?>"></td>
									</tr>

								<?php
								}
								?>

							</table>


						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-warning">Perbaharui Jumlah Pemesanan</button>
						</div>
					</div>
				</form>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
<?php
	}
}
?>
