<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2-bootstrap.min.css">
	'
]);
?>
<!-- Modal Konfirmasi Transaksi-->
<div class="modal fade" id="konfirmasiPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle1">
				Konfirmasi Transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			Anda yakin dengan transaksi ini? </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" onclick="createOrder()" id="btn-createOrder">Konfirmasi</button>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Checkout</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<div class="wizard mb-4">
						<div class="connecting-line"></div>
						<ul class="nav nav-tabs d-flex mb-3">
							<li class="nav-item mr-auto">
								<a class="nav-link position-relative round-tab text-left p-0 active border-0" data-toggle="tab" href="#id1">
									<i class="icon-bag position-relative text-white h5 mb-3"></i>
									<small class="d-none d-md-block font-weight-bold">Keranjang</small>
								</a>
							</li>
							<li class="nav-item mx-auto">
								<a class="nav-link position-relative round-tab text-sm-center text-left p-0 border-0" data-toggle="tab" href="#id2">
									<i class="icon-map position-relative text-white h5 mb-3"></i>
									<small class="d-none d-md-block font-weight-bold">Alamat</small>
								</a>
							</li>
							<li class="nav-item ml-auto">
								<a class="nav-link position-relative round-tab text-sm-right text-left p-0 border-0" data-toggle="tab" href="#id3">
									<i class="icon-credit-card position-relative text-white h5 mb-3"></i>
									<small class="d-none d-md-block font-weight-bold">Pembayaran</small>
								</a>
							</li>
						</ul>
						<div class="tab-content mt-5">
							<div class="tab-pane fade  active show" id="id1">
								<div class="form">
									<div class="row">
										<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
											<table class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0">
												<thead>
													<tr class="bg-transparent">
														<th class="border-bottom-0">Foto</th>
														<th class="border-bottom-0">Produk</th>
														<th class="border-bottom-0">Harga</th>
														<th class="border-bottom-0">Jumlah</th>
													</tr>
												</thead>
												<tbody id="cart-product-content">
													
												</tbody>
											</table>
										</div>
										<div class="col-lg-12 col-xl-5">
											<div class=" border mb-3">
												<div class="card-body border border-top-0 border-right-0 border-left-0">
													<h4 class="f-weight-500 mb-0">Ringkasan Harga</h4>
												</div>
												<div class="card-body">
													<div class="clearfix">
														<div class="float-left">
															<p class="mb-0 dark-color f-weight-600">Total: </p>
														</div>
														<div class="float-right">
															<p class="mb-0 dark-color f-weight-600 h4" id="cart-total-price"></p>
														</div>
													</div>
												</div>
											</div>
											<div class="clearfix">
												<div class="float-left w-100 text-right">
													<a href="#" class="btn btn-primary nexttab">Lanjut ke
													Alamat</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="id2">
								<div class="form">
									<div class="row">
										<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
											<div class=" border p-3">
												<h4>Alamat</h4>
												<div class="row">
													<div class="col-10">
														<div class="float-right w-100 border p-3">
															<b><?= $this->session->userdata('full_name'); ?></b>
															<address>
																
															</address>
															<a href="<?= base_url('profile') ?>" type="button" class="btn float-right btn-block btn-primary">Ubah Alamat</a>
														</div>
													</div>
													<div class="col-10">
														<div class="float-right w-100 border p-3">
															<label>Pilih Kurir <span class="text-danger">*</span></label>
															<label class="text-muted">Jika membeli produk lebih dari 1 seller, maka diharapkan memilih lebih dari 1 service kurir</label>
															<div class="form-group">
																<select class="style-select form-control" id="courier-select" data-id='' onchange="changeCourier(this)">
																</select>
																<div id="courier-service-container" class="mt-2">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-xl-5">
											<div class=" border mb-3">
												<div class="card-body border border-top-0 border-right-0 border-left-0">
													<h4 class="f-weight-500 mb-0">Ringkasan Harga</h4>
												</div>
												<div class="card-body border border-top-0 border-right-0 border-left-0">
													<div class="clearfix d-flex">
														<div class="float-left">
															<p>Subtotal:</p>
															<p class="mb-0">Ongkos Kirim:</p>
														</div>
														<div class="ml-auto">
															<p class="cart-subTotal"></p>
															<p class="cart-wayFee"></p>
														</div>
													</div>
												</div>
												<div class="card-body">
													<div class="clearfix">
														<div class="float-left">
															<p class="mb-0 dark-color f-weight-600">Total:</p>
														</div>
														<div class="float-right">
															<p class="mb-0 dark-color f-weight-600 h4" id="cart-total">
																
															</p>
														</div>
													</div>
												</div>
											</div>
											<div class="clearfix">
												<div class="float-left w-100 text-right">
													<a href="#" class="btn btn-primary nexttab">Lanjut ke
													Pembayaran</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="id3">
								<div class="form  row justify-content-md-center">
									<div class="col-12 col-md-6">
										<div class="border mb-3">
											<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
												<h4 class="f-weight-500 mb-0">Total belanjaan</h4>
											</div>
											<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
												<div class="clearfix">
													<div class="float-left">
														<p class="dark-colo">Subtotal:</p>
														<p class="mb-0 dark-color ">Ongkos kirim:</p>
													</div>
													<div class="float-right">
														<p class="cart-subTotal"></p>
														<p class="cart-wayFee mb-0"></p>
													</div>
												</div>
											</div>
											<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
												<div class="clearfix">
													<div class="float-left">
														<p class="mb-0 dark-color ">Total:</p>
													</div>
													<div class="float-right">
														<p class="mb-0 dark-color h4" id="cart-total-final"></p>
													</div>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group">
													<select class="form-control" id="payment-select" onchange="changePaymentMethod(this)"></select>
												</div>
											</div>
										</div>
										<button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasiPesanan">Oke, pesan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('template/footer', [
	'js' => '
		<script src="' . $plugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $js . '/user/cart/checkout.js"></script>
		<script>
			initPluginOption();
			getData();
		</script>
	'
]);
?>
