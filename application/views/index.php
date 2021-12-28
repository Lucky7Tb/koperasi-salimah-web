<?php
$userAssets = base_url('dist/user/assets');
$globalPlugin = base_url('dist/vendors');
$this->load->view('user/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $userAssets . '/css/owl.carousel.min.css">
		<link rel="stylesheet" href="' . $userAssets . '/css/owl.theme.default.min.css">
	'
]);
?>
<div class="container mt-5 mt-lg-3">
	<div class="row">
		<div class="col-lg-3 col-md-4">
			<div class="navbar-category">
				<div class="dropdown category-list-dropdown">
					<button class="btn dropdown-toggle" type="button" id="dropdownMenuButtoncategory" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<i class="bx bx-list-ul"></i>
						Categories
						<i class="bx bx-chevron-down"></i>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButtoncategory">
						<a href="#" class="nav-link-item">
							Fish and Meat
						</a>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-7 col-md-6">
			<div class="nav-bottom-form-area">
				<form class="nav-bottom-form">
					<input type="text" class="form-control" id="input-search-product" placeholder="Search Your Item">
					<button class="subscribe-btn btn-search" type="button" style="pointer-events: all; cursor: pointer;">
						Cari
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="col-12">
		<div>
			<div class="owl-carousel owl-theme">
				<?php if($banners['data']): ?>
				<?php foreach ($banners['data'] as $index => $banner): ?>
				<div class="banner-slider-item" style="height: 650px">
					<div class="banner-slider-img">
						<a href="<?= $banner['url'] ?>" target="_blank" rel="noopener noreferrer nofollow">
							<img src="<?= $banner['uri'] ?>" loading="lazy" alt="Banner Images" class="img-fluid" style="height: 650px">
						</a>
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<section class="popular-product-area pt-80 pb-70">
				<h2 class="text-center">Produk kami</h2>
				<div class="container">
					<?php if ($produk['data'] != null): ?>
					<div id="Container" class="row pt-45">
						<?php foreach ($produk['data'] as $p): ?>
						<div class="col-lg-3 col-sm-6 mix sale">
							<div class="popular-product-item">
								<a href="<?= base_url('product/detail/') ?><?= $p['id_m_products'] ?>">
									<img src="<?= $p['uri'] ?>" alt="<?= $p['product_name'] ?>">
								</a>
								<div class="content">
									<h3>
										<a href="<?= base_url('product/detail/') ?><?= $p['id_m_products'] ?>">
											<?= $p['product_name'] ?>
										</a>
									</h3>
									<span>
										<div class="d-inline-block text-danger card-text">Rp.
											<?= number_format($p['price'], '2', ',', '.') ?></div>
									</span>
									<ul class="popular-product-action">
										<li>
											<a href="javascript:void(0);" onclick="global.addToWishlist(<?= $p['id_m_products'] ?>)">
												<i class='bx bx-heart'></i>
											</a>
										</li>
										<li>
											<a href="javascript:void(0);" onclick="global.addToCart(<?= $p['id_m_products'] ?>)">
												<i class='bx bx-cart'></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
			</section>
		</div>
	</div>
	<div class="col-lg-12 col-md-12 text-center">
		<div class="pagination-area">
			<?= $this->pagination->create_links(); ?>
		</div>
	</div>

	<div class="row mb-3">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<div class="jumbotron jumbotron-fluid "
						style="background-image: url('<?= base_url('dist/images') ?>/tes3.png');">
						<div class="container">
							<h1 class="display-4 font-weight-bold">Mempermudah Belanja</h1>
							<h1 class="display-4 font-weight-bold">di Kossuma</h1>
							<h1 class="display-4 font-weight-bold">Tanpa Keluar Rumah</h1>
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
		<script src="'. $userAssets .'/js/mixitup.min.js"></script>
		<script src="'. $userAssets .'/js/owl.carousel.min.js"></script>
		<script src="'. $js .'/user/app.js"></script>
		<script>
			let page = 1
			let search = $("#input-search-product")
			let tCari = $(".btn-search")
			tCari.on("click", function() {
				let url = "' . base_url('user/index/') . '1/" + search.val()
				window.location.href = url
			})
			search.on("keypress", function(e) {
				if (e.keyCode === 13) {
					e.preventDefault();
					let url = "' . base_url('user/index/') . '1/" + search.val()
					window.location.href = url
					return false;
				}
			});
		</script>
	'
]);
?>
