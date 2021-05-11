<div id="header-fix" class="header fixed-top">
	<div class="site-width">
		<nav class="navbar navbar-expand-lg p-0">
			<div class="navbar-header  h-150 h4 mb-0 align-self-center logo-bar text-left" style="background-color: #491369;">
				<a href="<?= base_url('/admin/dashboard') ?>" class="horizontal-logo">
					<div class="media">
						<img src="<?= base_url('img/tes4.png') ?>" alt="Salimah logo" class="d-flex img-fluid" width="200">
					</div>
				</a>
			</div>
			<div class="navbar-right ml-auto h-150">
				<ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
					<li class="d-inline-block align-self-center d-block d-lg-none">
						<a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>
						</a>
					</li>
					<li class="dropdown user-profile align-self-center d-inline-block">
						<a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
							<div class="media">
								<img src="<?= $this->session->userdata('profile_picture'); ?>" alt="" class="d-flex img-fluid rounded-circle" width="29">
							</div>
						</a>
						<div class="dropdown-menu border dropdown-menu-right p-0">
							<a href="#" class="dropdown-item px-2 align-self-center d-flex">
								<span class="icon-settings mr-2 h6 mb-0"></span> Pengaturan Akun
							</a>
							<div class="dropdown-divider"></div>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('auth/logout') ?>" class="dropdown-item px-2 text-danger align-self-center d-flex">
								<span class="icon-logout mr-2 h6  mb-0"></span> Keluar
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
