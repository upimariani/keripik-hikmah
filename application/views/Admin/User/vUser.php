<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User</h1>
					<hr>
					<a href="<?= base_url('Admin/cUser/create') ?>" class="btn btn-app bg-warning">
						<i class="fas fa-users"></i> Tambah User
					</a>
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

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi User</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama User</th>
										<th>Username</th>
										<th>Password</th>
										<th>Level User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td><?= $value->nama_user ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->password ?></td>
											<td><?php if ($value->lev_user == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->lev_user == '2') {
												?>
													<span class="badge badge-warning">Gudang</span>
												<?php
												} else if ($value->lev_user == '3') {
												?>
													<span class="badge badge-info">Supplier</span>
												<?php
												} else if ($value->lev_user == '4') {
												?>
													<span class="badge badge-danger">Pemilik</span>
												<?php
												} ?>
											</td>
											<td>
												<div class="btn-group">
													<button type="button" class="btn btn-warning">Menu</button>
													<button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu" role="menu">
														<a class="dropdown-item" href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>">Hapus</a>
														<a class="dropdown-item" href="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>">Perbaharui</a>
													</div>
												</div>
											</td>
										</tr>
									<?php
									}
									?>


								</tbody>

							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
