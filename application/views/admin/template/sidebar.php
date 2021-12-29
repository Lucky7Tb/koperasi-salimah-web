<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Dashboard</div>
				<a class="nav-link <?= ($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == null) ? 'active' : '' ?>" href="<?= base_url('/admin/dashboard') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
					Home
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'product_Categories') ? 'active' : '' ?>" href="<?= base_url('/admin/product_Categories') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
					Kategori produk
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'product') ? 'active' : '' ?>" href="<?= base_url('/admin/product') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
					Produk
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'banner') ? 'active' : '' ?>" href="<?= base_url('/admin/banner') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
					Banner
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'user') ? 'active' : '' ?>" href="<?= base_url('/admin/user') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Management user
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'payment') ? 'active' : '' ?>" href="<?= base_url('/admin/payment') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
					Rekening bank
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'delivery') ? 'active' : '' ?>" href="<?= base_url('/admin/delivery') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
					Pengiriman
				</a>
				<a class="nav-link <?= ($this->uri->segment(2) == 'transaction') ? 'active' : '' ?>"  href="<?= base_url('/admin/transaction') ?>">
					<div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
					Transaksi
				</a>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Login sebagai:</div>
			<?= $this->session->userdata('username') ?>
		</div>
	</nav>
</div>
