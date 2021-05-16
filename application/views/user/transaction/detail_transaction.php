<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
		<link rel="stylesheet" href="' . $plugin . '/fancybox/jquery.fancybox.min.css">
	'
]);
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0" id="transaction-token"></h4>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
							<h4>List Belanja</h4>
							<table class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0 p-3 text-center">
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
										<td>Rp5.000,00</td>
									</tr>
									<tr>
										<td colspan="4">Total harga</td>
										<td id="transaction-total-price"></td>
									</tr>
								</tbody>
							</table>

							<div>
								<h4>Alamat</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="float-right w-100 border p-3" id="transaction-address">
											<b>Udin Saefudin</b>
											<address>
												Jalan Yang Lurus No 6 RT06/09<br>Kel Kiri Kec Kanan
												Wakanda<br>0812 3456 7890 </address>
										</div>
									</div>
								</div>
							</div>

							<div>
								<h4>Kurir</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="float-right w-100 border p-3" id="transaction-courier">
											<b>JNE</b>
											<p>Resi : 00112233445566778899</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-xl-5">
							<div>
								<p class="h4" id="transaction-status"></p>
							</div>
							<div>
								<h4>Bukti Pembayaran</h4>
								<div class="row p-3">
									<div class="col-10">
										<div class="card-body">
											<form id="transaction-proof-form">
												<div class="form-group">
													<input name="photo" class="dropify" id="photo" type="file" data-max-file-size="2M" data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" required />
												</div>
												<button type="submit" class="btn btn-lg btn-block btn-primary" id="btn-upload-proof">Upload</button>
											</form>
											<p class="h6 mt-2 text-center" id="transaction-message"></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- <div class="row">
						<div class="col-12 col-sm-12 mt-3">
							<div class="card">
								<div class="card-body">
									<h4>Review</h4>
									<form>
										<h6 class="float-left"> Rating: </h6>
										<ul class="list-inline mb-0 mt-2">
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
											</li>
											<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
											</li>
										</ul><br>
										<div class="form-group">
											<div id="snow-container" class="height-175"></div>
										</div>
									</form>
									<a href="#" class="btn btn-success">Upload Review</a>
								</div>
							</div>
						</div>
					</div> -->
					<button type="button" class="btn btn-lg btn-block btn-outline-dark" onclick="history.back()">Kembali</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer', [
	'js' => '
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $plugin . '/fancybox/jquery.fancybox.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/user/transaction/detail-transaction.js"></script>
		<script>
			initOptionPlugin();
			getDetailTransaction("'.$id.'");
		</script>
	'
]);
?>