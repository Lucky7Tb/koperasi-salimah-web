<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
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
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
							<table class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0">
								<thead>
									<tr class="bg-transparent">
										<th class="border-bottom-0">Foto</th>
										<th class="border-bottom-0">Produk</th>
										<th class="border-bottom-0">Harga</th>
										<th class="border-bottom-0">Jumlah</th>
										<th class="border-bottom-0"></th>
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
											<p class="mb-0 dark-color f-weight-600">Total:</p>
										</div>
										<div class="float-right">
											<p class="mb-0 dark-color f-weight-600 h4" id="cart-total-price">Rp. 0</p>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix d-sm-flex">
								<div class="float-right w-100 text-center text-sm-right">
									<p class="mb-0 h6">
										<a href="javascript:void(0)" class="btn btn-lg btn-success" id="checkout-button">
											<i class="icon-handbag h6"></i> Lanjut ke Checkout
										</a>
									</p>
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
		<script src="'. $js .'/user/cart/app.js"></script>
		<script>
			getCart();
		</script>
	'
]);
?>
