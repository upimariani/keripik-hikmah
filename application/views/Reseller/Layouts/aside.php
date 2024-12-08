<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/logo2.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8">
		<span>RESELLER</span>
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
					<a href="<?= base_url('Reseller/cProfile') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Reseller' && $this->uri->segment(2) == 'cProfile') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Profile
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Reseller/cKatalog') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Reseller' && $this->uri->segment(2) == 'cKatalog') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-shopping-basket"></i>
						<p>
							Katalog Produk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Reseller/cTransaksi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Reseller' && $this->uri->segment(2) == 'cTransaksi') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-warehouse"></i>
						<p>
							Transaksi Produk
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
