<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
?>

<div class="container-fluid site-width">
	<!-- START: Breadcrumbs-->
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Keranjang</h4>
				</div>

				<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item">Keranjang</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->


	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
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
								<tbody>
									<tr>
										<td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Flowers Structured Coat</td>
										<td class="align-middle">Rp398.000,00</td>
										<td class="w-25 align-middle"><input type="number" class="form-control" value="1"></td>
										<td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
									</tr>
									<tr>
										<td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Cotton White Top</td>
										<td class="align-middle">Rp398.000,00</td>
										<td class="w-25 align-middle"><input type="number" class="form-control" value="2"></td>
										<td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
									</tr>
									<tr>
										<td><img src="dist/images/ecommerce-img8.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Flowers Structured Coat</td>
										<td class="align-middle">Rp398.000,00</td>
										<td class="w-25 align-middle"><input type="number" class="form-control" value="1"></td>
										<td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
									</tr>
									<tr>
										<td><img src="dist/images/ecommerce-img2.jpg" alt="" class="img-fluid" width="60"></td>
										<td class="align-middle">Cotton White Top</td>
										<td class="align-middle">Rp398.000,000</td>
										<td class="w-25 align-middle"><input type="number" class="form-control" value="2"></td>
										<td class="align-middle"><a href="#"><i class="icon-trash"></i></a></td>
									</tr>
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
											<p class="mb-0 dark-color f-weight-600 h4">Rp816.000,00</p>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix d-sm-flex">
								<div class="float-right w-100 text-center text-sm-right">
									<p class="mb-0 h6"><a href="<?= base_url('cart/checkout') ?>" class="btn btn-success"><i class="icon-handbag h6"></i> Lanjut ke Checkout</a></p>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>


		</div>


	</div>
	<!-- END: Card DATA-->

</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer');
?>
