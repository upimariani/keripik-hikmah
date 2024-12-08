<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/logo2.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8">
		<span>PEMILIK</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->


		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('Pemilik/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Pemilik' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pemilik/cLapBahanBaku') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Pemilik' && $this->uri->segment(2) == 'cLapBahanBaku') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-swatchbook"></i>
						<p>
							Lap. Pemesanan
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Pemilik/cLapProduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Pemilik' && $this->uri->segment(2) == 'cLapProduk') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-book-open"></i>
						<p>
							Lap. Transaksi Produk
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('cLogin/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
