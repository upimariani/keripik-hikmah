<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Produk Keripik Pedas Hikmah</h1>


				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Produk</li>
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
							<h3 class="card-title">Masukkan Data Produk</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<?= form_open_multipart('Admin/cBahanJadi/create') ?>
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Produk</label>
								<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk">
								<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Keterangan</label>
								<input type="text" name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Keterangan">
								<?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
							</div>

							<div class="form-group">
								<label for="exampleInputPassword1">Deskripsi</label>
								<textarea name="deskripsi" id="summernote">
                Place <em>some</em> <u>deskripsi produk</u> <strong>here</strong>
              </textarea>
								<?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Stok</label>
								<input type="text" name="stok" class="form-control" id="exampleInputstok1" placeholder="Masukkan Stok">
								<?= form_error('stok', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Harga</label>
								<input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga">
								<?= form_error('harga', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Gambar Produk</label>
								<input type="file" name="gambar" class="form-control" id="exampleInputstok1" placeholder="Masukkan Stok" required>
								<?= form_error('stok', '<small class="text-danger">', '</small>') ?>
							</div>

						</div>



						<!-- /.card-body -->

						<div class="card-footer">
							<button type="submit" class="btn btn-app bg-success">
								<i class="fas fa-save"></i> Save
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