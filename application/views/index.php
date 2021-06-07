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

	<!-- START: Breadcrumbs-->
	<div class="row">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h4 class="mb-0">Produk Baru</h4>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Breadcrumbs-->

	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<?php
						if ($produk['data'] != null) {
							$i = 1;
							foreach ($produk['data'] as $p) {
						?>

								<div class="col-md-6 col-lg-3 mb-4">
									<div class="position-relative">
										<div style="background-size: 300px 300px;">
											<img style="height: 300px;" src="<?= $p['uri'] ?>" alt="" class="img-fluid">

										</div>
										<div class="caption-bg fade bg-transparent text-right">
											<div class="d-table w-100 h-100 ">
												<div class="d-table-cell align-bottom">
													<div class="mb-3">
														<a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i class="icon-heart"></i></a>
													</div>
													<div class="mb-4">
														<a href="#" class="rounded-left bg-white px-3 py-2 shadow2"><i class="icon-bag"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="pt-3">
										<p class="mb-2"><a href="<?= base_url('product/detail/') ?><?= $p['id_m_products'] ?>" class="font-weight-bold text-primary"><?= $p['product_name'] ?></a></p>
										<div class="clearfix">
											<div class="d-inline-block text-danger pl-2">Rp. <?= number_format($p['price'], '2', ',', '.') ?></div>
											<ul class="list-inline mb-0 mt-2">
												<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
												<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
												<li class="list-inline-item"><a href="#" class="text-primary"><i class="icon-star"></i></a></li>
												<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
												</li>
												<li class="list-inline-item"><a href="#"><i class="icon-star"></i></a>
												</li>
											</ul>
										</div>
									</div>
								</div>

						<?php
								$i++;
							}
						}

						?>
					</div>
					<div class="row">
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- END: Card DATA-->


	<div class="col-12 mt-3">
		<div class="card">

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

<?php
$js = base_url('dist/js');
$this->load->view('template/footer', array(
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
	</script>'
));
?>