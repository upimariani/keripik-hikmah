<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Profile</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User Profile</li>
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
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-danger card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= base_url('asset/Admin/') ?>dist/img/user4-128x128.jpg" alt="User profile picture">
							</div>

							<h3 class="profile-username text-center"><?= $profile->nama_reseller ?></h3>

							<p class="text-muted text-center">Reseller</p>
							<?php
							$jml_tran = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE id_reseller='" . $profile->id_reseller . "'")->row();
							$total_tran = $this->db->query("SELECT SUM(total_pembayaran) as total FROM `transaksi_bj` WHERE id_reseller='" . $profile->id_reseller . "'")->row();
							?>
							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Jumlah Transaksi</b> <a class="float-right"><?= number_format($jml_tran->jml) ?> x</a>
								</li>
								<li class="list-group-item">
									<b>Total Pembelian</b> <a class="float-right">Rp. <?= number_format($total_tran->total) ?></a>
								</li>

							</ul>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link btn-info active" href="#activity" data-toggle="tab">Chatting</a></li>
								<li class="nav-item"><a class="nav-link btn-warning" href="#settings" data-toggle="tab">Profile</a></li>
							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<!-- Post -->
									<div class="post">
										<?php
										foreach ($chat as $key => $value) {
											if ($value->reseller_send == '0') {
										?>
												<div class="user-block">
													<img class="img-circle img-bordered-sm" src="<?= base_url('asset/Admin/') ?>dist/img/user1-128x128.jpg" alt="user image">
													<span class="username">
														<a href="#">Gudang</a>

													</span>
													<span class="description"><?= $value->time ?></span>
												</div>

												<!-- /.user-block -->
												<p>
													<?= $value->gudang_send ?>
												</p>
												<hr>
											<?php
											} else {
											?>
												<div class="user-block">
													<img class="img-circle img-bordered-sm" src="<?= base_url('asset/Admin/') ?>dist/img/user4-128x128.jpg" alt="user image">
													<span class="username">
														<a href="#"><?= $value->nama_reseller ?></a>

													</span>
													<span class="description"><?= $value->time ?></span>
												</div>

												<!-- /.user-block -->
												<p>
													<?= $value->reseller_send ?>
												</p>
												<hr>
										<?php
											}
										}
										?>


										<form action="<?= base_url('Reseller/cProfile/chat/' . $this->session->userdata('id_reseller')) ?>" method="POST">
											<input class="form-control form-control-sm" name="pesan" type="text" placeholder="Type a message ..." required autofocus>
											<button type="submit" class="btn btn-success btn-sm mt-2"><i class="fas fa-paper-plane"></i> Kirim</button>
										</form>
									</div>
									<!-- /.post -->

								</div>

								<div class="tab-pane" id="settings">
									<form action="<?= base_url('Reseller/cProfile/perbaharui/' . $profile->id_reseller) ?>" method="POST" class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" value="<?= $profile->nama_reseller ?>" class="form-control" id="inputName" name="nama" placeholder="Nama" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
											<div class="col-sm-10">
												<input type="text" name="alamat" class="form-control" value="<?= $profile->alamat ?>" id="inputEmail" placeholder="Alamat" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Nomor Telepon</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" value="<?= $profile->no_hp ?>" id="inputName2" name="no_hp" placeholder="No Telepon" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Username</label>
											<div class="col-sm-10">
												<input type="text" name="username" class="form-control" value="<?= $profile->username ?>" id="inputName2" placeholder="Username" required>
											</div>
										</div>

										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="text" name="password" class="form-control" value="<?= $profile->password ?>" id="inputName2" placeholder="Password" required>
											</div>

										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger">Perbaharui</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>