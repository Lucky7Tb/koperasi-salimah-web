<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Tambah Kategori Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body" id="main">
					<form method="post" id="user-form">
						<div class="form-group mb-3">
							<label for="full_name">Nama kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
										 placeholder="Masukan nama kategori" value="<?php set_value('nama_kategori')?>">
							<?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group mb-3">
							<label for="full_name">Deskripsi kategori</label>
							<input type="text" name="deskripsi" id="deskripsi" class="form-control"
										 placeholder="Masukan deskripsi kategori" value="<?php set_value('deskripsi')?>">
							<?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?= base_url('admin/product_Categories') ?>" class="btn btn-outline-dark text-center" role="button">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer');
?>
