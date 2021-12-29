<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
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
					<form id="payment-form">
						<div class="form-group mb-3">
							<label for="bank_name">Nama bank</label>
							<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Masukan nama bank" required>
						</div>
						<div class="form-group mb-3">
							<label for="number_account">No rekening</label>
							<input type="number" name="number_account" id="number_account" class="form-control" placeholder="Masukan no rekening" required>
						</div>
						<div class="form-group mb-3">
							<label for="bank_code">Kode bank</label>
							<input type="number" name="bank_code" id="bank_code" class="form-control" placeholder="Masukan no akun" required>
						</div>
						<div class="form-group mb-3">
							<label for="name_account_bank">Nama pemilik akun</label>
							<input type="text" name="name_account_bank" id="name_account_bank" class="form-control" placeholder="Masukan nama pemilik akun" required>
						</div>
						<div class="form-group mb-3">
							<label for="photo">Thumbnail pembayaran</label>
							<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M" data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary" id="btn-add-payment">Simpan</button>
							<a href="<?= base_url('admin/payment') ?>" class="btn btn-outline-dark text-center" role="button">Kembali</a>
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
		<script src="' . $globalPlugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $js . '/admin/payment/create.js"></script>
	'
]);
?>
