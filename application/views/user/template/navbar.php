<nav class="top-header" style="background-color: #491369">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-3 col-md-4">
				<div class="top-header-social">
					<ul>
						<li>
							<a href="https://www.facebook.com/salimahfood" target="_blank"><i class='bx bxl-facebook'></i></a>
						</li>
						<li>
							<a href="https://www.instagram.com/kossumabandung" target="_blank"><i class='bx bxl-instagram'></i></a>
						</li>
						<li>
							<a href="https://www.tiktok.com/@salimahfoodofficial" target="_blank"><i class='bx bxl-tiktok'></i></a>
						</li>
						<li>
							<a href="https://www.youtube.com/channel/UCZdzt-ScWWnnm3lWD-PaMAA" target="_blank"><i class='bx bxl-youtube'></i></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-9 col-md-8">
				<div class="top-header-right">
					<div class="top-header-right-item">
						<ul class="top-header-list">
							<li><a href="<?= base_url('profile') ?>">Profilku</a></li>
							<?php if ($this->session->userdata('token') == null) : ?>
								<li><a href="<?= base_url('auth') ?>">Masuk</a></li>
							<?php else : ?>
								<li><a href="<?= base_url('auth/logout') ?>">Keluar</a></li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>

<!-- Start Navbar Area -->
<div class="navbar-area">
	<!-- Menu For Mobile Device -->
	<div class="mobile-nav">
		<a href="<?= base_url() ?>" style="width: 35%" class="logo">
			<img class="img-fluid" src="<?= base_url('dist/images/salimah_logo.png') ?>" alt="Salimah logo">
		</a>
	</div>

	<!-- Menu For Desktop Device -->
	<div class="main-nav" style="background-color: #761fa8">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light ">
				<a class="navbar-brand" href="<?= base_url() ?>" style="width: 15%">
					<img class="img-fluid" src="<?= base_url('dist/images/salimah_logo.png') ?>" alt="Salimah logo">
				</a>

				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav m-auto">
						<ul class="navbar-nav m-auto">
							<li class="nav-item">
								<a href="<?= base_url() ?>" class="nav-link">
									<i class='bx bx-home'></i> Beranda
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('transaction') ?>" class="nav-link">
									<i class='bx bx-money'></i> Transaksi
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url('wishlist') ?>" class="nav-link">
									<i class='bx bx-heart'></i> Wishlist
								</a>
							</li>
							<li class="nav-item cart-span">
								<a href="<?= base_url('cart') ?>" class="nav-link">
									<i class='bx bx-cart'></i> Keranjang
								</a>
							</li>
						</ul>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<div class="side-nav-responsive">
		<div class="container">
			<div class="dot-menu">
				<div class="circle-inner">
					<div class="circle circle-one"></div>
					<div class="circle circle-two"></div>
					<div class="circle circle-three"></div>
				</div>
			</div>

			<div class="container">
				<div class="side-nav-inner">
					<div class="side-nav justify-content-center align-items-center">
						<div class="side-nav-item">
							<ul class="nav-right-list">
								<li><a href="<?= base_url('transaction') ?>"><i class='bx bx-money'></i></a></li>
								<li><a href="<?= base_url('wishlist') ?>"><i class='bx bx-heart'></i></a></li>
								<li>
									<a href="<?= base_url('cart') ?>"><i class='bx bx-cart'></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Navbar Area -->
