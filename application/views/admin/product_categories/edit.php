<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
			<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
			<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
		'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Ubah Kategori Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body" id="main">
					<form method="post" id="user-form">
						<?php
						$kategori = $category['data']['category'];
						$deskripsi = $category['data']['description'];
						?>
						<div class="form-group">
							<label for="full_name">Nama kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
										 placeholder="Masukan nama kategori" value="<?= set_value('nama_kategori', $kategori)?>">
							<?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<div class="form-group">
							<label for="full_name">Deskripsi kategori</label>
							<input type="text" name="deskripsi" id="deskripsi" class="form-control"
										 placeholder="Masukan deskripsi kategori" value="<?= set_value('deskripsi', $deskripsi)?>">
							<?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>') ?>
						</div>
						<button type="submit" class="btn-lg btn-block btn-primary">Ubah</button>
						<a href="<?= base_url('admin/product_categories') ?>" class="btn-lg btn-block btn-outline-dark text-center" role="button">Back</a>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $plugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		
	'
]);
?>
