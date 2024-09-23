<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/Admin/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">KERIPIK HIKMAH</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/Admin/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Gudang</a>
			</div>
		</div>

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
					<a href="<?= base_url('Gudang/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cPemesanan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cPemesanan') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-shopping-basket"></i>
						<p>
							Pemesanan Bahan Baku
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cBbKeluar') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cBbKeluar') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-warehouse"></i>
						<p>
							Bahan Baku Keluar
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cTransaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cTransaksi') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-cash-register"></i>
						<p>
							Transaksi Produk
						</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>