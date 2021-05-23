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
					<h2 class="mb-0">Detail Produk</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-12 col-lg-5">
							<?php
							$kategori = $produk['data']['categories'];
							$produk = $produk['data']['product'];
							$namaProduk = $produk['product_name'];
							$harga = $produk['price'];
							$stok = $produk['stock'];
							$berat = $produk['weight'];
							$deskripsi = $produk['description'];
							$uri = $produk['uri'];
							?>

							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="<?= $uri ?>" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="dist/images/cap2.jpg" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="dist/images/ecommerce-img1.jpg" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
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
								<h3 class="mb-0"><a href="#" class="f-weight-500 text-primary"><?= $namaProduk ?></a></h3>
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
											<h4 class="lato-font mb-0 text-danger">Rp. <?= number_format($harga, '2', ',', '.') ?></h4>
										</div>
									</div>

								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="position-relative">
									<div class="media d-md-flex d-block">
										<a href="#"><img src="dist/images/contact-3.jpg" width="40" alt="" class="img-fluid rounded-circle"></a>
										<div class="media-body z-index-1">
											<div class="pl-4">
												<h6>Admin</h6>
											</div>
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

									<li class="font-weight-bold dark-color mb-2">Kategory: 
										<?php $i=0; foreach($kategori as $c){
											?>
											<span class="body-color font-weight-normal"><?= $kategori[$i]['category'] ?></span>

											<?php
										}
										?>
									</li>

									<li class="font-weight-bold dark-color mb-2">Share:
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-facebook"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-twitter"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-dribbble"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-pinterest"></i></a>
										<a href="#" title="facebook" class="body-color mr-2"><i class="icon-social-linkedin"></i></a>
									</li>
								</ul>
								<div class="mr-3">
									<button class="btn btn-primary" onclick="global.addToWishlist(<?= $id ?>)" id="btn-add-wishlist">Tambah ke Wishlist <i class="icon-heart"></i></button>
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
										<div class="col-md-6">
											<p class="pb-3">Rp. <?= $deskripsi ?></p>
											
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
	'
]);
?>
