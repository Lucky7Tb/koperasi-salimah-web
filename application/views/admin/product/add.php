<?php
$globalPlugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/select2/css/select2-bootstrap.min.css">
	'
]);
?>
<div class="container">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Tambah Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-header  justify-content-between align-items-center">
					<a type="button" class="btn btn-outline-secondary" href="<?= base_url('admin/product') ?>">
						Kembali
					</a>
				</div>
				<div class="card-body">
					<form class="row col-12" method="post" enctype="multipart/form-data">
						<div class="col-12 col-sm-4">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Foto Produk</h4>
								</div>
								<div class="card-body">
									<input name="cover" class="dropify" id="photo" type="file" data-max-file-size="2M"
												 data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-8">
							<div class="form-group row mb-3">
								<label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nama_produk" placeholder="Nama Produk"
												 value="<?php set_value('product_name') ?>"
												 name="product_name">
									<?= form_error('product_name', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="harga" class="col-sm-2 col-form-label">Harga</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="harga" placeholder="Rp 00.000,00"
												 value="<?php set_value('price') ?>" name="price">
									<?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
								<div class="col-sm-10">
									<select id="kategori" class="form-control" name="categories[]" multiple="multiple">
										<?php foreach ($category['data'] as $c) : ?>
											<option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="stok" class="col-sm-2 col-form-label">Stok</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="stok" placeholder="000"
												 value="<?php set_value('stock') ?>" name="stock">
									<?= form_error('stock', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="weight" class="col-sm-2 col-form-label">Berat</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="weight" placeholder="000 gram"
												 value="<?php set_value('weight') ?>" name="weight">
									<?= form_error('weight', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea name="description" id="deskripsi" cols="80" rows="5"
														value="<?php set_value('description') ?>" class="form-control"></textarea>
									<?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
						</div>
						<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
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
		<script src="' . $globalPlugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $globalPlugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $globalPlugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/product/app.js"></script>
		<script>
			$(document).ready(function() {
				$("#kategori").select2();
				initOptionPlugin();
			});
		</script>
	'
]);
?>
