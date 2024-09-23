<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- general form elements -->
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title">Perbaharui Data User</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= base_url('Admin/cUser/update/' . $user->id_user) ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama User</label>
									<input type="text" name="nama" value="<?= $user->nama_user ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama User">
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Username</label>
											<input type="text" name="username" value="<?= $user->username ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Username">
											<?= form_error('username', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Password</label>
											<input type="text" name="password" value="<?= $user->password ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password">
											<?= form_error('password', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>


								<div class="form-group">
									<label for="exampleInputPassword1">Level User</label>
									<select name="level" class="form-control">
										<option value="">Pilih Level User</option>
										<option value="1" <?php if ($user->lev_user == '1') {
																echo 'selected';
															} ?>>Admin</option>
										<option value="2" <?php if ($user->lev_user == '2') {
																echo 'selected';
															} ?>>Gudang</option>
										<option value="3" <?php if ($user->lev_user == '3') {
																echo 'selected';
															} ?>>Supplier</option>
										<option value="4" <?php if ($user->lev_user == '4') {
																echo 'selected';
															} ?>>Pemilik</option>
									</select>
									<?= form_error('level', '<small class="text-danger">', '</small>') ?>
								</div>

							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-app bg-success">
									<i class="fas fa-save"></i> Save Perubahan
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

				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>