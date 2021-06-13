<!-- START: Header-->
<div id="header-fix" class="header fixed-top" style="background-color: #491369;">
	<div class="site-width">
		<nav class="navbar navbar-expand-lg  p-0">
			<div class="navbar-header  h-200 h4 mb-0 align-self-center logo-bar text-left">
				<a href="<?= base_url('/') ?>" class="horizontal-logo text-left">
					<div class="media">
						<a href="<?= base_url('/') ?>">
							<img src="<?= base_url('/dist/images/salimah_logo.png') ?>" alt="logo" class="d-flex img-fluid" loading="lazy">
						</a>
					</div>
				</a>
			</div>
			<form class="float-left d-none d-lg-block search-form" style="background-color: white;">
				<div class="form-group mb-0 position-relative">
					<input id="input-search-product" type="text" class="form-control border-0 rounded bg-search pl-5" placeholder="Cari produk...." value="<?= $this->uri->segment(4) ?>">
					<div class="btn-search position-absolute top-0">
						<a href="#"><i class="h6 icon-magnifier"></i></a>
					</div>
					<a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>
					</a>

				</div>
			</form>
			<div class="navbar-right ml-auto h-100">
				<ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
					<li class="d-inline-block align-self-center  d-block d-lg-none">
						<a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>
						</a>
					</li>

					<!-- Keranjang -->
					<li class="dropdown align-self-center d-inline-block" style="background-color: white;">
						<a href="<?= base_url('cart') ?>" class="nav-link" aria-expanded="false"><i class="icon-basket h4"></i>
					</a>
					</li>
					<!-- Akun user -->
					<li class="dropdown user-profile align-self-center d-inline-block" style="background-color: white;">
						<a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
							<div class="media">
								<?php if ($this->session->userdata('profile_picture') !== null) : ?>
									<img src="<?= $this->session->userdata('profile_picture'); ?>" alt="" class="d-flex img-fluid rounded-circle" width="29">

								<?php else : ?>
									<img src="<?= base_url('dist/images/author.jpg') ?>" alt="" class="d-flex img-fluid rounded-circle" width="29">

								<?php endif; ?>
							</div>
						</a>

						<div class="dropdown-menu border dropdown-menu-right p-0">
							<a href="<?= base_url('profile') ?>" class="dropdown-item px-2 align-self-center d-flex">
								<span class="icon-user mr-2 h6 mb-0"></span> Profil
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('transaction') ?>" class="dropdown-item px-2 align-self-center d-flex">
								<span class="icon-bag mr-2 h6 mb-0"></span> Transaksi
							</a>
							<a href="<?= base_url('wishlist') ?>" class="dropdown-item px-2 align-self-center d-flex">
								<span class="icon-heart mr-2 h6 mb-0"></span> Wishlist
							</a>
							<div class="dropdown-divider"></div>

							<?php if ($this->session->userdata('token') !== null): ?>
								<a href="<?= base_url('auth/logout') ?>" class="dropdown-item px-2 text-danger align-self-center d-flex">
								<span class="icon-logout mr-2 h6  mb-0"></span> Keluar
							</a>

							<?php else: ?>
								<a href="<?= base_url('auth') ?>" class="dropdown-item px-2 text-success align-self-center d-flex">
								<span class="icon-login mr-2 h6  mb-0"></span> Masuk
							</a>
							<?php endif ?>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- END: Header-->
