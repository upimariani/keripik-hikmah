<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Katalog Produk<strong> Keripik Pedas Hikmah</strong></h1>
					<small class="text-danger">Jika pembelian produk lebih dari 100 kg maka, harga dikurangi 50% dari harga asli! Dipotong dari total pembelian</small>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Katalog Produk</li>
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

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row">

					<?php
					foreach ($produk as $key => $value) {
					?>

						<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
							<form action="<?= base_url('Reseller/cKatalog/addcart') ?>" method="POST">
								<input value="<?= $value->id_bj ?>" name="id" hidden>
								<input value="<?= $value->nama_bj ?>" name="nama" hidden>
								<input value="<?= $value->harga ?>" name="harga" hidden>
								<input value="<?= $value->stok ?>" name="stok" hidden>
								<input value="<?= $value->gambar ?>" name="gambar" hidden>
								<div class="card bg-light d-flex flex-fill">
									<div class="card-header text-muted border-bottom-0">
										Keripik Pedas Hikmah
									</div>
									<div class="card-body pt-0">
										<div class="row">
											<div class="col-7">
												<h2 class="lead"><b><?= $value->nama_bj ?></b></h2>
												<p class="text-muted text-sm"><b>Deskripsi: </b> <?= $value->deskripsi ?> </p>
												<ul class="ml-4 mb-0 fa-ul text-muted">
													<li class="small"><span class="fa-li"><i class="fas fa-info"></i></span> Stok: <?= $value->stok ?></li>
													<li class="small"><span class="fa-li"><i class="fas fa-money-check-alt"></i></span> Harga #: Rp. <?= number_format($value->harga) ?></li>
												</ul>
											</div>
											<div class="col-5 text-center">
												<img src="<?= base_url('asset/produk/' . $value->gambar) ?>" alt="user-avatar" class="img-circle img-fluid">
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="row">
											<div class="col-lg-6">
												<input type="text" name="qty" class="form-control" placeholder="Masukkan Quantity" required>
											</div>
											<div class="col-lg-6 text-right">
												<button type="submit" class="btn btn-sm btn-info">
													<i class="fas fa-cart-plus"></i> Add To Cart
												</button>
											</div>
										</div>



									</div>
								</div>
							</form>
						</div>

					<?php
					}
					?>


				</div>
			</div>
			<!-- /.card-body -->

			<!-- /.card-footer -->
		</div>
		<!-- /.card -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
