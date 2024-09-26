<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__wobble" src="<?= base_url('asset/Admin/') ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
		</div>
		<!-- Navbar -->
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
				//chatting reseller
				$jml = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chat` GROUP BY id_reseller")->row();
				$dt = $this->db->query("SELECT * FROM `chat` JOIN user ON user.id_user=chat.id_user JOIN reseller ON reseller.id_reseller=chat.id_reseller GROUP BY reseller.id_reseller")->result();
				if ($dt) {
				?>
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-comments"></i>
							<span class="badge badge-danger navbar-badge"><?= $jml->jml ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<?php
							foreach ($dt as $key => $value) {
							?>
								<a href="<?= base_url('Gudang/cDashboard/chat/' . $value->id_reseller) ?>" class="dropdown-item">
									<!-- Message Start -->
									<div class="media">
										<div class="media-body">
											<h3 class="dropdown-item-title">
												<?= $value->nama_reseller ?>
												<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
											</h3>
											<p class="text-sm"><?= $value->no_hp ?></p>
											<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $value->time ?></p>
										</div>
									</div>
									<!-- Message End -->
								</a>
								<div class="dropdown-divider"></div>
							<?php
							}
							?>


						</div>
					</li>
				<?php
				}
				?>



			</ul>
		</nav>
		<!-- /.navbar -->
