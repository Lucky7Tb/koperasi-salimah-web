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
					<h1>Tambah Layanan Pengiriman</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-header  justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/delivery') ?>">Kembali</a>
				</div>
				<div class="card-body">
					<form class="row col-12" method="post" enctype="multipart/form-data">
						<div class="col-12 col-sm-4">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Logo Layanan</h4>
								</div>
								<div class="card-body">
									<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M"
												 data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-8">
							<div class="form-group row">
								<label for="name_expedition" class="col-sm-2 col-form-label">Nama Ekspedisi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name_expedition" placeholder="Nama Ekspedisi"
												 name="name_expedition" value="<?php set_value('name_expedition')?>">
									<?= form_error('name_expedition', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="courier_code" class="col-sm-2 col-form-label">Kode Kurir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="courier_code" placeholder="Kode Kurir"
												 name="courier_code" value="<?php set_value('courier_code')?>">
									<?= form_error('courier_code', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
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
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $js . '/admin/delivery/app.js"></script>
		<script>
			initOptionPlugin();
		</script>
	'
]);
?>
