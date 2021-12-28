<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('user/template/header');
?>

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Keranjang</h4>
				</div>
			</div>
		</div>
	</div>
	<section class="cart-wraps-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<form>
						<div class="cart-wraps">
							<div class="cart-table table-responsive">
								<table class="table table-bordered">
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

							<div class="cart-buttons">
								<div class="row align-items-center">
									<div class="col-lg-7 col-sm-7 col-md-7">
										<div class="continue-shopping-box">
											<a href="<?= base_url() ?>" class="default-btn btn-bg-three">
												<i class="bx bx-cart"></i> Lanjut belanja
											</a>
										</div>
									</div>

									<div class="col-lg-5 col-sm-5 col-md-5 text-right">
										<a href="javascript:void(0)" id="checkout-button" class="default-btn btn-bg-three">
											<i class="bx bx-money"></i> Lanjut ke Checkout
										</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>


	<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="'. $js .'/user/cart/app.js"></script>
		<script>
			getCart();
		</script>
	'
]);
?>
