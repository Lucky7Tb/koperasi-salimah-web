<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
	'
]);
?>
<div class="container">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Ubah Layanan Pengiriman</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-header  justify-content-between align-items-center">
					<a type="button" class="btn btn-outline-secondary" href="<?= base_url('admin/delivery') ?>">Kembali</a>
				</div>
				<div class="card-body">
					<form class="row col-12" method="post" enctype="multipart/form-data">
						<?php
						$namaEkspedisi = $pengiriman['data']['name_expedition'];
						$kodeKurir = $pengiriman['data']['courier_code'];
						$uri = $pengiriman['data']['uri'];
						$status = $pengiriman['data']['is_visible'];
						?>
						<div class="col-12 col-sm-4">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Logo Layanan</h4>
								</div>
								<div class="card-body">
									<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M"
										data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg"
										data-default-file="<?= $uri ?>">
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-8">
							<div class="form-group row mb-3">
								<label for="name_expedition" class="col-sm-2 col-form-label">Nama Ekspedisi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name_expedition" placeholder="Nama Ekspedisi"
										name="name_expedition" value="<?= set_value('name_expedition', $namaEkspedisi)?>">
									<?= form_error('name_expedition', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="courier_code" class="col-sm-2 col-form-label">Kode Kurir</label>
								<div class="col-sm-10">
									<input type="text" value="<?= set_value('courier_code', $kodeKurir)?>" class="form-control"
										id="courier_code" placeholder="Kode Kurir" name="courier_code">
									<?= form_error('courier_code', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label for="weight" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<?php for ($i = 0; $i < 2; $i++) : ?>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="is_visible" id="status<?= $i ?>"
											value="<?= $i ?>" <?= $i == $status ? 'checked' : '' ?>>
										<label class="form-check-label" for="status<?= $i ?>">
											<?= $i == 0 ? 'Tidak Aktif' : 'Aktif' ?>
										</label>
									</div>
									<?php endfor; ?>
								</div>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-primary">Simpan</button>
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
