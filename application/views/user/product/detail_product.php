<?php
$seller = $produk['data']['seller'];
$kategori = $produk['data']['categories'];
$productPhotos = $produk['data']['photos'];
$produk = $produk['data']['product'];
$namaProduk = $produk['product_name'];
$harga = $produk['price'];
$stok = $produk['stock'];
$deskripsi = $produk['description'];
$uri = $produk['uri'];
$phoneNumber = str_split($seller[0]['phone_number']);
$phoneNumber[0] = '62';
$phoneNumber = join($phoneNumber);
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$userAssets = base_url('dist/user/assets');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/whatsapp/floating-wpp.min.css">
		<link rel="stylesheet" href="' . $userAssets . '/css/owl.carousel.min.css">
		<link rel="stylesheet" href="' . $userAssets . '/css/owl.theme.default.min.css">
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

	<div class="product-details-area pt-100 pb-70">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-12">
					<div class="product-detls-image">
						<div class="banner-slider-area">
							<div class="banner-slider owl-carousel owl-theme">
								<div class="container-fluid">
									<div class="banner-slider-item">
										<div class="row align-items-center">
											<div class="col-12">
												<div class="banner-slider-img">
													<img src="<?= $uri ?>" loading="lazy" alt="<?= $namaProduk ?>" style="height: 350px;"
														class="img-fluid d-block mx-auto">
												</div>
											</div>
										</div>
									</div>
									<?php foreach ($productPhotos as $photo) : ?>
										<div class="banner-slider-item">
											<div class="row align-items-center">
												<div class="col-12">
													<div class="banner-slider-img">
														<img src="<?= $photo['uri'] ?>" loading="lazy" alt="<?= $namaProduk ?>" style="height: 350px;"
															class="img-fluid d-block mx-auto">
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6 col-md-12">
					<div class="product-desc">
						<h3><?= $namaProduk ?></h3>
						<div class="price">
							<span class="new-price">Rp. <?= number_format($harga, '2', ',', '.') ?></span>
						</div>
						<div class="price">
							<span class="new-price">Sisa stok: <?= $produk['stock'] ?></span>
						</div>
						<p><?= $deskripsi ?></p>
						<p>
							Kategori:
							<?php foreach ($kategori as $c) : ?>
							<span class="badge badge-info badge-pill font-weight-normal"><?= $c['category'] ?></span>
							<?php endforeach; ?>
						</p>
						<div class="input-count-area">
							<h3>Jumlah</h3>
							<div class="input-counter">
								<span class="minus-btn"><i class='bx bx-minus'></i></span>
								<input type="text" class="form-control" min="1" value="1" id="product-qty"
									onchange="this.value == '0' ? '1' : this.value">
								<span class="plus-btn"><i class='bx bx-plus'></i></span>
							</div>
						</div>

						<div class="product-add-btn">
							<button type="button" onclick="global.addToWishlist(<?= $produk['id_m_products'] ?>)"
								class="default-btn btn-bg-three">
								<i class='bx bx-heart'></i> Wishlist
							</button>
							<button type="button" onclick="addToCart(<?= $produk['id_m_products'] ?>)"
								class="default-btn btn-bg-three">
								<i class='bx bxs-cart-add'></i> Tambah ke keranjang
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="product-tab pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="tab products-details-tab">
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<ul class="tabs">
									<li>
										<a href="#">
											Deskripsi
										</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-12 col-md-12">
								<div class="tab_content current active pt-45">
									<div class="tabs_item current">
										<div class="products-tabs-decs">
											<p><?= $deskripsi ?></p>
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
$this->load->view('user/template/footer', [
	'js' => '
		<script src="' . $plugin . '/whatsapp/floating-wpp.min.js"></script>
		<script src="'. $userAssets .'/js/owl.carousel.min.js"></script>
		<script src="' . $js . '/user/product/product-detail.js"></script>
		<script src="' . $js . '/user/app.js"></script>
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
