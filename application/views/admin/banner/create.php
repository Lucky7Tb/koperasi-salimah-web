<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
	'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body" id="main">
					<form method="post" id="banner-form">
						<div class="form-group">
							<label for="url">Link banner</label>
							<input type="text" name="url" id="url" class="form-control" placeholder="Masukan link banner" required>
						</div>
						<div class="form-group">
							<label for="photo">Foto banner</label>
							<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M" data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
						</div>
						<button type="submit" class="btn-lg btn-block btn-primary" id="btn-add-banner">Simpan</button>
						<a href="<?= base_url('admin/banner') ?>" class="btn-lg btn-block btn-outline-dark text-center" role="button">Kembali</a>
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
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $js . '/admin/banner/create.js"></script>
		<script>
			initOptionPlugin();
		</script>
	'
]);
?>
