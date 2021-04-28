<div class="sidebar ungu">
	<div class="site-width">
		<ul id="side-menu" class="sidebar-menu">
			<li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
				<ul>
					<li class="<?= ($this->uri->segment(2) == 'Dashboard' || $this->uri->segment(2) == null) ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/Dashboard') ?>" class="<?= ($this->uri->segment(2) == 'Dashboard' || $this->uri->segment(2) == null) ? '' : 'text-white' ?>">
							<i class="icon-home"></i>
							Dashboard
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'Product' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/Product') ?>" class="<?= $this->uri->segment(2) == 'Product' ? '' : 'text-white' ?>">
							<i class="icon-social-dropbox"></i>
							Produk
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'ProductCategories' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/ProductCategories') ?>" class="<?= $this->uri->segment(2) == 'ProductCategories' ? ' ' : 'text-white' ?>">
							<i class="icon-list"></i>
							Kategori produk
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'User' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/User') ?>" class="<?= $this->uri->segment(2) == 'User' ? '' : 'text-white' ?>">
							<i class="icon-people"></i>
							Management user
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'Payment' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/Payment') ?>" class="<?= $this->uri->segment(2) == 'Payment' ? '' : 'text-white' ?>">
							<i class="icon-credit-card"></i>
							Metode Pembayaran
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'Delivery' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/Delivery') ?>" class="<?= $this->uri->segment(2) == 'Delivery' ? '' : 'text-white' ?>">
							<i class="icon-paper-plane"></i>
							Pengiriman
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'Transaction' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/Transaction') ?>" class="<?= $this->uri->segment(2) == 'Transaction' ? '' : 'text-white' ?>">
							<i class="icon-basket-loaded"></i>
							Transaksi
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
