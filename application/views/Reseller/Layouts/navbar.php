<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?= base_url('asset/Admin/') ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>

			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Navbar Search -->
				<?php
				$qty = 0;
				foreach ($this->cart->contents() as $key => $value) {
					$qty += $value['qty'];
				}
				if ($qty != 0) {
				?>
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="fas fa-cart-plus"></i>
							<span class="badge badge-danger navbar-badge"><?= $qty ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<?php
							foreach ($this->cart->contents() as $key => $value) {
							?>
								<span class="dropdown-item">
									<!-- Message Start -->
									<div class="media">
										<img src="<?= base_url('asset/produk/' . $value['gambar']) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
										<div class="media-body">
											<h3 class="dropdown-item-title">
												<?= $value['name'] ?>
												<a href="<?= base_url('Reseller/cKatalog/delete/' . $value['rowid']) ?>" class="text-right text-sm text-danger">
													<i class="fas fa-trash"></i>
												</a>

											</h3>
											<p class="text-sm">Rp. <?= number_format($value['price']) ?> <?= $value['qty'] ?>x</p>
											<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Rp. <?= number_format($value['price'] * $value['qty']) ?></p>

										</div>
									</div>
									<!-- Message End -->
								</span>
								<div class="dropdown-divider"></div>
							<?php
							}
							?>


							<a href="<?= base_url('Reseller/cKatalog/selesai') ?>" class="dropdown-item dropdown-footer">Pesan</a>
						</div>
					</li>
				<?php
				}
				?>



			</ul>
		</nav>
		<!-- /.navbar -->
