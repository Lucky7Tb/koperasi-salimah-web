<div class="sidebar ungu">
	<div class="site-width">
		<ul id="side-menu" class="sidebar-menu">
			<li class="dropdown"><a href="#"><i class="icon-home mr-1"></i> Dashboard</a>
				<ul>
					<li class="<?= ($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == null) ? 'active' : '' ?>">
						<a href="<?= base_url('/admin') ?>" class="<?= ($this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == null) ? '' : 'text-white' ?>">
							<i class="icon-home"></i>
							Dashboard
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'product' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/product') ?>" class="<?= $this->uri->segment(2) == 'product' ? '' : 'text-white' ?>">
							<i class="icon-social-dropbox"></i>
							Produk
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'product_categories' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/product_categories') ?>" class="<?= $this->uri->segment(2) == 'product_categories' ? ' ' : 'text-white' ?>">
							<i class="icon-list"></i>
							Kategori produk
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/user') ?>" class="<?= $this->uri->segment(2) == 'user' ? '' : 'text-white' ?>">
							<i class="icon-people"></i>
							Management user
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'payment' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/payment') ?>" class="<?= $this->uri->segment(2) == 'payment' ? '' : 'text-white' ?>">
							<i class="icon-credit-card"></i>
							Metode Pembayaran
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'delivery' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/delivery') ?>" class="<?= $this->uri->segment(2) == 'delivery' ? '' : 'text-white' ?>">
							<i class="icon-paper-plane"></i>
							Pengiriman
						</a>
					</li>
					<li class="<?= $this->uri->segment(2) == 'transaction' ? 'active' : '' ?>">
						<a href="<?= base_url('/admin/transaction') ?>" class="<?= $this->uri->segment(2) == 'transaction' ? '' : 'text-white' ?>">
							<i class="icon-basket-loaded"></i>
							Transaksi
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
