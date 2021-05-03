<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $css . '/styles.css">
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
	'
]);
?>

<!-- Change payment thumbnail modal -->
<div class="modal fade" id="payment-thumbnail-modal" tabindex="-1" aria-labelledby="paymentThumbnailLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paymentThumbnailLabel">Ubah thumbnail pembayaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="payment-thumbnail-form">
				<div class="modal-body">
					<div class="form-group">
						<label for="photo">Thumbnail pembayaran</label>
						<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M" data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary" id="btn-change-thumbnail">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>


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
			<div class="card">
				<div class="card-body" id="main">
					<form id="payment-form">
						<div class="form-group">
							<label for="bank_name">Nama bank</label>
							<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Masukan nama bank" required>
						</div>
						<div class="form-group">
							<label for="number_account">No rekening</label>
							<input type="number" name="number_account" id="number_account" class="form-control" placeholder="Masukan no rekening" required>
						</div>
						<div class="form-group">
							<label for="bank_code">Kode bang</label>
							<input type="number" name="bank_code" id="bank_code" class="form-control" placeholder="Masukan no akun" required>
						</div>
						<div class="form-group">
							<label for="name_account_bank">Nama pemilik akun</label>
							<input type="text" name="name_account_bank" id="name_account_bank" class="form-control" placeholder="Masukan nama pemilik akun" required>
						</div>
						<div class="form-group">
							<label for="is_visible">Status pembayaran</label>
							<select class="form-control" name="is_visible" id="is_visible">
								<option value="1">Aktif</option>
								<option value="0">Tidak aktif</option>
							</select>
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#payment-thumbnail-modal">
								Ubah thumbanail
							</button>
						</div>
						<button type="submit" class="btn-lg btn-block btn-primary" id="btn-update-payment">Submit</button>
						<a href="<?= base_url('admin/payment') ?>" class="btn-lg btn-block btn-outline-dark text-center" role="button">Back</a>
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
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/payment/edit.js"></script>
		<script>
			initPlugiOption();
			getPayment();
		</script>
	'
]);
?>
