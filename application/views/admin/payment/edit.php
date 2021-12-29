<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
	'
]);
?>

<div class="modal fade" id="payment-thumbnail-modal" tabindex="-1" aria-labelledby="paymentThumbnailLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paymentThumbnailLabel">Ubah thumbnail pembayaran</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="payment-thumbnail-form">
				<div class="modal-body">
					<div class="form-group">
						<label for="photo">Thumbnail pembayaran</label>
						<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M" data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" aria-label="Close">Tutup</button>
					<button type="submit" class="btn btn-primary" id="btn-change-thumbnail">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="container">
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
							<label for="is_visible">Status pembayaran</label>
							<select class="form-control" name="is_visible" id="is_visible">
								<option value="1">Aktif</option>
								<option value="0">Tidak aktif</option>
							</select>
						</div>
						<div class="form-group mb-3">
							<button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#payment-thumbnail-modal">
								Ubah thumbnail
							</button>
						</div>
						<div class="d-grid gap-2">
							<button type="submit" class="btn btn-primary" id="btn-update-payment">Simpan</button>
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
		<script src="' . $js . '/admin/payment/edit.js"></script>
	'
]);
?>
