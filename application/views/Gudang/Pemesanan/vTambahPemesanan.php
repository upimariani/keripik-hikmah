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
						<li class="breadcrumb-item active">User</li>
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
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-5">
					<!-- general form elements -->
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Masukkan Bahan Baku</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= base_url('Gudang/cPemesanan/create') ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Supplier</label>
									<select id="supplier" class="form-control" name="supplier">
										<option value="">Pilih Supplier</option>
										<?php
										$supplier = $this->db->query("SELECT * FROM `user` WHERE lev_user='3'")->result();
										foreach ($supplier as $key => $value) {
										?>
											<option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
										<?php
										}
										?>
									</select>
									<?= form_error('supplier', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Bahan Baku</label>
									<select id="bahanbaku" class="form-control" name="bb">
										<option value="">Pilih Bahan Baku</option>

									</select>
									<?= form_error('bb', '<small class="text-danger">', '</small>') ?>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Nama Bahan Baku</label>
											<input type="text" name="nama" class="nama form-control" id="exampleInputPassword1" readonly>
											<input type="text" name="stok" class="stok form-control" id="exampleInputPassword1" hidden>

										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Harga</label>
											<input type="text" name="harga" class="harga form-control" id="exampleInputPassword1" readonly>

										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Quantity</label>
									<input type="text" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Quantity Pemesanan">
									<?= form_error('qty', '<small class="text-danger">', '</small>') ?>
								</div>



							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-app bg-success">
									<i class="fas fa-save"></i> Add To Cart
								</button>
								<a href="<?= base_url('Admin/cUser') ?>" class="btn btn-app bg-danger">
									<i class="fas fa-backspace"></i> Kembali
								</a>
							</div>
						</form>
					</div>
					<!-- /.card -->

				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<?php
				if ($this->cart->contents()) {
				?>
					<div class="col-md-7">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Keranjang Pemesanan Bahan Baku</h3>
							</div>
							<!-- /.card-header -->
							<form action="<?= base_url('Gudang/cPemesanan/pesan') ?>" method="POST">
								<div class="card-body">
									<table id="example2" class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Bahan Baku</th>
												<th>Harga</th>
												<th>Quantity</th>
												<th>Sub Total</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($this->cart->contents() as $key => $value) {
											?>
												<tr>
													<td><?= $value['name'] ?></td>
													<td>Rp. <?= number_format($value['price']) ?></td>
													<td><?= $value['qty'] ?></td>
													<td>Rp. <?= number_format($value['qty'] * $value['price']) ?></td>
													<td class="text-center"><a href="<?= base_url('Gudang/cPemesanan/delete/' . $value['rowid']) ?>"><i class="fas fa-trash-restore-alt"></i></a></td>
												</tr>

											<?php
											} ?>

										</tbody>
										<tfoot>
											<tr>
												<th>Supplier</th>
												<th><select class="form-control" name="supplier" required>
														<option value="">Pilih Supplier</option>
														<?php
														foreach ($user as $key => $value) {
															if ($value->lev_user == '3') {
														?>
																<option value="<?= $value->id_user ?>"><?= $value->nama_user ?></option>
														<?php
															}
														}
														?>
													</select></th>
												<th>Total</th>
												<th>Rp. <?= number_format($this->cart->total()) ?></th>
												<th><button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Selesai</button></th>
											</tr>
										</tfoot>
									</table>
								</div>
							</form>
							<!-- /.card-body -->
						</div>
					</div>
				<?php
				}
				?>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
