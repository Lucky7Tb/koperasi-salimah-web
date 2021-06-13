<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('template/header');
?>

<div class="container-fluid site-width">
	<div class="col-12 mt-3">
		<div class="card">
			<div class="card-body">
				<div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('img/tes2.png') ?>');">
					<div class="container">
						<h1 class="display-4 font-weight-bold">Selamat Datang di</h1>
						<h1 class="display-4 font-weight-bold">Koperasi Salimah</h1>
						<h1 class="display-4 font-weight-bold">Kota Bandung</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Produk Baru</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card border-0">
				<div class="card-body">
					<div class="row row-cols-md-4 g-4">
						<?php if ($produk['data'] != null): ?>
							<?php foreach ($produk['data'] as $p): ?>
							<div class="col mb-3">
								<div class="card h-100">
									<div 
										style="width: 100%; height: 250px; background-image: url(<?= $p['uri'] ?>); background-position: center; background-size: cover; background-repeat: no-repeat"
									>
									</div>
									<div class="card-body">
										<p class="card-title">
											<a href="<?= base_url('product/detail/') ?><?= $p['id_m_products'] ?>" class="font-weight-bold text-primary h6"><?= $p['product_name'] ?></a>
										</p>
										<div class="clearfix">
											<div class="d-inline-block text-danger card-text">Rp. <?= number_format($p['price'], '2', ',', '.') ?></div>
										</div>
										<div class="divider"></div>
										<div class="row text-center mt-2">
											<div class="col-6">
												<button class="btn btn-lg btn-block btn-danger p-2 shadow2" data-toggle="modal" data-target="#deleteWishlistModal" onclick="global.addToWishlist(<?= $p['id_m_products'] ?>)">
													Wishlist <i class="icon-heart"></i>
												</button>
											</div>
											<div class="col-6">
												<button class="btn btn-lg btn-block btn-primary p-2 shadow2" onclick="global.addToCart(<?= $p['id_m_products'] ?>)">
													Cart <i class="icon-basket"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<div class="row mt-5">
						<div class="col-12">
							<?= $this->pagination->create_links(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Card DATA-->
	
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-body">
					<div class="jumbotron jumbotron-fluid " style="background-image: url('<?= base_url('img') ?>/tes3.png');">
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
$this->load->view('template/footer', [
	'js' => '
		<script>
		let page = 1
		let search = $("#input-search-product")
		let tCari = $("#tombol-cari")
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
		})
		</script>
	'
]);
?>
