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
					<h4 class="mb-0">Detail Produk</h4>
				</div>

				<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
					<li class="breadcrumb-item active"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><a href="#">Produk</a></li>
					<li class="breadcrumb-item">Detail Produk</li>
				</ol>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-lg-5">
							<div id="product_image" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" id="product_list_photo"></div>
								<a class="carousel-control-prev" href="#product_image" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#product_image" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="col-md-12 col-lg-7">
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<h3 class="mb-0" id="product_name"></h3>
							</div>
							<div class="card-body border border-top-0 border-right-0 border-left-0">
								<div class="clearfix">
									<div class="float-left mr-2">
										<ul class="list-inline mb-0" id="product_rating">
											
										</ul>
									</div>
								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="row">
									<div class="col-12">
										<div class="float-left ml-2">
											<h4 class="lato-font mb-0 text-danger" id="product_price"></h4>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="d-inline-block mr-3">
									<p class="dark-color f-weight-600">Jumlah: </p>
								</div>
								<div class="d-inline-block mr-3">
									<div class="form-group">
										<input type="number" class="form-control" value="1">
									</div>
								</div>
								<div class="d-inline-block mr-3">
									<p class="dark-color f-weight-600" id="product_stock"></p>
								</div>
								<div class="mr-3">
									<a href="#" class="btn btn-primary">Tambah ke Keranjang</a>
								</div>
							</div>
							<div class="card-body">
								<ul class="list-unstyled">
									<li class="font-weight-bold dark-color mb-2" id="product_list_category">
										Kategori:
									</li>
								</ul>
								<div class="mr-3">
									<a href="#" class="btn btn-primary">Tambah ke Wishlist <i class="icon-heart"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<ul class="nav nav-pills flex-column flex-sm-row justify-content-center ">
								<li class="nav-item">
									<a class="nav-link body-color h6 mb-0 active" data-toggle="tab" href="#description"> Deskripsi produk
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link body-color h6 mb-0" data-toggle="tab" href="#seller">Seller</a>
								</li>
							</ul>
							<div class="tab-content mt-5" id="myTabContent">
								<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description">
									<div class="row">
										<div class="col-12">
											<p class="lead pb-3" id="product_description"></p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller">
									<div class="row" id="list_seller">
										<div class="col-md-6">
											<div class="media d-md-flex d-block">
												<img width="40" class="img-fluid rounded-circle">
												<div class="media-body z-index-1">
													<div class="pl-4">
														<h6>Udin</h6>
													</div>
												</div>
											</div>
											<p class="pb-3">
												Lorem ipsum dolor sit amet, consectetuer
												adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
												Cum sociis natoque penatibus et magnis dis parturient montes,
												nascetur ridiculus mus. Donec quam felis, ultricies nec,
												pellentesque eu, pretium quis, sem. Nulla consequat massa quis
												enim. Donec pede justo, fringilla vel, aliquet nec,.
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
	</div>
</div>

<?php
$js = base_url('dist/js');
$this->load->view('template/footer', [
	'js' => '
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/user/product/product-detail.js"></script>
		<script>
			getProductDetail(' . $id . ');
		</script>
	'
]);
?>
