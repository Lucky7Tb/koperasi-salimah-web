<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/whatsapp/floating-wpp.min.css">
	'
]);
?>
<div id="whatsapp-chat-button" style="z-index: 999"></div>

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
							$seller = $produk['data']['seller'];
							$sellerLocation = $produk['data']['location'];
							$kategori = $produk['data']['categories'];
							$productPhotos = $produk['data']['photos'];
							$produk = $produk['data']['product'];
							$namaProduk = $produk['product_name'];
							$harga = $produk['price'];
							$stok = $produk['stock'];
							$berat = $produk['weight'];
							$deskripsi = $produk['description'];
							$uri = $produk['uri'];
							$phoneNumber = str_split($seller[0]['phone_number']);
							$phoneNumber[0] = '62';
							$phoneNumber = join($phoneNumber);
							?>

							<div id="product-corousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="<?= $uri ?>" alt="<?= $namaProduk ?>">
									</div>

									<?php foreach ($productPhotos as $photo) : ?>
										<div class="carousel-item">
											<img class="d-block w-100" src="<?= $photo['uri'] ?>" alt="<?= $namaProduk ?>" loading="lazy">
										</div>
									<?php endforeach; ?>
								</div>
								<a class="carousel-control-prev" href="#product-corousel" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#product-corousel" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="col-md-12 col-lg-7">
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<h3 class="mb-0"><a href="#" class="f-weight-500 text-primary"><?= $namaProduk ?></a></h3>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<div class="row">
									<div class="col-12">
										<div class="float-left">
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
											<div>
												<h6>Admin: <?= $seller[0]['full_name'] ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
								<h6 class="lato-font mb-2">Sisa stok: <?= $produk['stock'] ?></h6>
								<div class="d-inline-block mr-3">
									<p class="dark-color f-weight-600">Jumlah: </p>
								</div>
								<div class="d-inline-block mr-3">
									<div class="form-group">
										<input type="number" class="form-control" min="1" value="1" id="product-qty" onchange="this.value == '0' ? '1' : this.value">
									</div>
								</div>
								<div class="d-inline-block mr-3">
									<p class="dark-color f-weight-600" id="product_stock"></p>
								</div>
								<div class="mr-3">
									<button class="btn btn-primary" onclick="addToCart(<?= $produk['id_m_products'] ?>)">Tambah ke Keranjang <i class="icon-basket"></i></button>
								</div>
							</div>
							<div class="card-body">
								<ul class="list-unstyled">
									<li class="font-weight-bold dark-color mb-2">Kategori:
										<?php foreach ($kategori as $c) : ?>
											<span class="badge badge-info badge-pill font-weight-normal"><?= $c['category'] ?></span>
										<?php endforeach; ?>
									</li>
								</ul>
								<div class="mr-3">
									<button class="btn btn-primary" onclick="global.addToWishlist(<?= $produk['id_m_products'] ?>)" id="btn-add-wishlist">Tambah ke Wishlist <i class="icon-heart"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 mt-3">
			<div class="card" style="margin-bottom: 200px">
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
										<div class="col-md-12">
											<p class="lead text-center">Rp. <?= $deskripsi ?></p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller">
									<div class="row" id="list_seller">
										<div class="col-12">
											<img src="<?= $seller[0]['uri'] ?>" class="img-fluid rounded-circle d-block mx-auto" loading="lazy" width="20%" />
											<h4 class="text-center mt-3"><?= $seller[0]['full_name'] ?></h4>
											<h5 class="text-center">Lokasi admin</h5>
											<p class="lead text-center h6">
												<?php foreach($sellerLocation as $location): ?>
													<?= $location['province'] ?>
												<?php endforeach; ?>
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
		<script src="' . $plugin . '/whatsapp/floating-wpp.min.js"></script>
		<script src="' . $js . '/user/product/product-detail.js"></script>
		<script>
			$("#whatsapp-chat-button").floatingWhatsApp({
		    phone: "'. $phoneNumber.'",
		    popupMessage: "Hallo ada yang bisa saya bantu?",
		    message: "Halo, kak. Apakah produk *'.$namaProduk.'* masih tersedia?",
		    showPopup: true,
		    showOnIE: false,
		    headerTitle: "Hai, selamat datang",
		    headerColor: "lightgreen",
		    backgroundColor: "lightgreen",
		    buttonImage: "<img src='. base_url("dist/images/wa.png") .' />"
			});
		</script>
	'
]);
?>
