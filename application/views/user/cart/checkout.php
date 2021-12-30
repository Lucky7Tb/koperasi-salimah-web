<?php
$userAssets = base_url('dist/user/assets');
$globalPlugin = base_url('dist/vendors');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $userAssets . '/css/nice-select.min.css">
		<link rel="stylesheet" href="' . $userAssets . '/css/smart_wizard.min.css">
	'
]);
?>
<!-- Modal Konfirmasi Transaksi-->
<div class="modal fade" id="konfirmasiPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1"
	aria-hidden="true">
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
				<button type="button" class="default-btn btn btn-outline-secondary text-dark"
					data-dismiss="modal">Batal</button>
				<button class="default-btn btn btn-bg-three" onclick="createOrder()" id="btn-createOrder">Konfirmasi</button>
			</div>
		</div>
	</div>
</div>

<div class="container pb-100 mt-5 mt-sm-5">
	<div id="smartwizard">
		<ul class="nav">
			<li>
				<a class="nav-link" href="#step-1">
					Detail keranjang
				</a>
			</li>
			<li>
				<a class="nav-link" href="#step-2">
					Pengiriman
				</a>
			</li>
			<li>
				<a class="nav-link" href="#step-3">
					Pembayaran
				</a>
			</li>
		</ul>

		<div class="tab-content" style="min-height: 180px">
			<div id="step-1" class="tab-pane" role="tabpanel">
				<section class="cart-wraps-area">
					<div class="container">
						<div class="row" id="product-row">
							<div class="col-lg-12 col-md-12">
								<form class="mt-5">
									<div class="cart-wraps">
										<div class="cart-table table-responsive">
											<table class="table table-bordered text-center">
												<thead>
													<tr>
														<th scope="col">Foto</th>
														<th scope="col">Produk</th>
														<th scope="col">Jumlah beli</th>
														<th scope="col">Harga satuan</th>
													</tr>
												</thead>

												<tbody id="cart-product-content">
												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div id="step-2" class="tab-pane" role="tabpanel">
				<section class="cart-wraps-area">
					<div class="container">
						<div class="row" id="shipping-row">
							<div class="col-lg-6">
								<div class="cart-calc mb-5">
									<div class="cart-wraps-form">
										<h3>Pengiriman</h3>
										<div class="row">
											<div class="col-12">
												<p>Alamat pengiriman</p>
												<div class="float-right w-100 border p-3">
													<b><?= $this->session->userdata('full_name'); ?></b>
													<address></address>
													<a href="<?= base_url('profile') ?>" type="button"
														class="default-btn btn-bg-three btn btn-block">Ubah Alamat</a>
												</div>
											</div>
											<div class="col-12">
												<p>Kurir</p>
												<div class="float-right w-100 border p-3">
													<div class="row">
														<div class="col-12">
															<div class="form-group">
																<label for="gender">Pilih kurir</label>
																<select id="courier-select" data-id='' onchange="changeCourier(this)">
																</select>
															</div>
														</div>
														<div class="col-12">
															<div id="courier-service-container" class="ml-3">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="cart-totals">
									<h3>Ringkasan harga</h3>
									<ul>
										<li>Subtotal <span class="cart-subTotal"></span></li>
										<li>Ongkos kirim <span class="cart-wayFee"></span></li>
										<li>Total <span id="cart-total"><b></b></span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div id="step-3" class="tab-pane" role="tabpanel">
				<section class="cart-wraps-area">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="cart-totals">
									<h3>Total harga belanja</h3>
									<ul>
										<li>Subtotal <span class="cart-subTotal"></span></li>
										<li>Ongkos kirim <span class="cart-wayFee"></span></li>
										<li>
											<h4>
												Total <span id="cart-total-final"></span>
											</h4>
										</li>
									</ul>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="gender">Mau transfer kemana?</label>
												<select id="payment-select" class="form-control w-100" onchange="changePaymentMethod(this)">
												</select>
											</div>
										</div>
									</div>
									<button class="default-btn btn-bg-three btn btn-block mt-3" data-toggle="modal"
										data-target="#konfirmasiPesanan">
										Oke pesan
									</button>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="' . $globalPlugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $globalPlugin . '/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="' . $userAssets . '/js/jquery.nice-select.min.js"></script>
		<script src="' . $userAssets . '/js/jquery.smartWizard.min.js"></script>
		<script src="' . $js . '/user/cart/checkout.js"></script>
		<script>
			initPluginOption();
			getData();
		</script>
	'
]);
?>
