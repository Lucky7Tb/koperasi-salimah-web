<?php
$globalPlugin = base_url('dist/vendors');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $globalPlugin . '/dropify/css/dropify.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/fancybox/jquery.fancybox.min.css">
		<link rel="stylesheet" href="' . $globalPlugin . '/whatsapp/floating-wpp.min.css">
	'
]);
?>
<div id="whatsapp-chat-button" class="d-none" style="z-index: 999"></div>

<div class="container mt-5 mt-sm-0">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h2 class="mb-0" id="transaction-token"></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-lg-6 col-xl-6">
							<h4 class="ml-3">List Belanja</h4>
							<div class="table-responsive">
								<table
									class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0 p-3 text-center">
									<thead>
										<tr class="bg-transparent">
											<th class="border-bottom-0">Foto</th>
											<th class="border-bottom-0">Produk</th>
											<th class="border-bottom-0">Jumlah</th>
											<th class="border-bottom-0">Harga</th>
											<th class="border-bottom-0">Sub total</th>
										</tr>
									</thead>
									<tbody id="transaction-product">
										<tr>
											<td colspan="4">Ongkir</td>
											<td id="transaction-cost-delivery"></td>
										</tr>
										<tr>
											<td colspan="4">Total harga</td>
											<td id="transaction-total-price"></td>
										</tr>
										<tr class="d-none" id="confirm-button-container">
											<td colspan="5">
												<button class="btn btn-lg btn-block btn-primary" data-target="#confirm-modal"
													data-toggle="modal">Konfirmasi barang diterima
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-xl-6 col-xl-5">
							<div>
								<p class="h4" id="transaction-status"></p>
							</div>
							<div>
								<h4>Bukti Pembayaran</h4>
								<div class="row p-3">
									<div class="col-12">
										<div class="card-body">
											<form id="transaction-proof-form">
												<div class="form-group">
													<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M"
														data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
												</div>
												<button type="submit" class="default-btn btn-bg-three btn btn-lg btn-block"
													id="btn-upload-proof">Upload</button>
											</form>
											<p class="h6 mt-2 text-center" id="transaction-message"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-12 col-xl-7 mb-4">
							<h4 class="ml-3">Alamat penerima</h4>
							<div class="row p-3">
								<div class="col-12">
									<div class="float-right w-100 border p-3" id="transaction-address">
										<address></address>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-12 col-lg-6 col-xl-6">
							<h4>Kurir</h4>
							<div class="row">
								<div class="col-12">
									<div class="float-right w-100 border p-3" id="transaction-courier">
									</div>
								</div>
								<div class="col-12 mt-2">
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead>
												<tr>
													<th>Deskripsi</th>
													<th>Kota</th>
													<th>Tanggal</th>
													<th>Waktu</th>
												</tr>
											</thead>
											<tbody id="resi-detail"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 col-xl-6">
							<h4>Bayar ke</h4>
							<div class="row">
								<div class="col-12">
									<div class="float-right w-100 border p-3" id="transaction-address">
										<p id="bank_name"></p>
										<p id="bank_code"></p>
										<p id="no_account"></p>
										<div id="qris-container">
											<h6 class="text-center">Atau</h6>
											<button type="button" class="default-btn btn-bg-three btn btn-block" id="qris-button"
												data-target="#qris-modal" data-toggle="modal">Bayar dengan Qris</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="default-btn btn btn-lg btn-block btn-outline-dark text-dark"
						onclick="history.back()">Kembali</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Confirm package -->
<div class="modal fade" id="confirm-modal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="lead"><strong>Yakin paket anda telah sampai?</strong></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-lg btn-outline-dark" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-lg btn-primary" id="btn-confirm-delivery"
					onclick="confirmTransaction(<?= $id ?>)">Ya Sampai</button>
			</div>
		</div>
	</div>
</div>

<!-- Confirm package -->
<div class="modal fade" id="qris-modal">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pembayaran dengan Qris</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3 class="text-center">Harap scan gambar Qris ini</h3>
				<img src="<?= base_url('dist/images/Qris.jpeg') ?>" alt="Qris" loading="lazy" class="img-fluid d-block mx-auto">
			</div>
			<div class="modal-footer">
				<button type="button" class="default-btn btn btn-outline-secondary text-dark"
					data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="' . $globalPlugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $globalPlugin . '/moment/moment.js"></script>
		<script src="' . $globalPlugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $globalPlugin . '/whatsapp/floating-wpp.min.js"></script>
		<script src="' . $js . '/user/transaction/detail-transaction.js"></script>
		<script>
			$(document).ready(function () {
				initOptionPlugin();
				getDetailTransaction("'.$id.'");
			});
		</script>
	'
]);
?>
