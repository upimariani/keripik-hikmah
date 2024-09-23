<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bahan Baku</h1>
					<hr>

				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Bahan Baku</li>
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
							<h3 class="card-title">Perbaharui Data Bahan Baku</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= base_url('Admin/cBahanBaku/update/' . $bb->id_bb) ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Bahan Baku</label>
									<input type="text" value="<?= $bb->nama_bb ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Bahan Baku">
									<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								</div>

								<div class="form-group">
									<label for="exampleInputPassword1">Keterangan</label>
									<input type="text" name="keterangan" value="<?= $bb->keterangan ?>" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Keterangan">
									<?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
								</div>

								<div class="form-group">
									<label for="exampleInputPassword1">Stok</label>
									<input type="text" name="stok" value="<?= $bb->stok ?>" class="form-control" id="exampleInputstok1" placeholder="Masukkan Stok">
									<?= form_error('stok', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Harga</label>
									<input type="text" name="harga" value="<?= $bb->harga ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga">
									<?= form_error('harga', '<small class="text-danger">', '</small>') ?>
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