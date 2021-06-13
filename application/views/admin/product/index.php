<?php
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1><?= $title ?></h1>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_SESSION['pesan'])) {
		echo $this->session->flashdata('pesan');
		unset($_SESSION['pesan']);
	}
	?>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary"
						 href="<?= base_url('admin/product/tambah') ?>">Tambah <?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
						<div id="example_filter" class="dataTables_filter">
							<label>
								Cari:
								<input type="search" class="form-control form-control-sm" id="input-search-product" autocomplete="off"
											 placeholder="Cari..." value="<?= $key ?>">
							</label>
							<button class="btn btn-primary" id="button-search" type="button">Cari</button>
						</div>

						<!-- START: Product -->
						<div class="row mt-2" id="data-products">
							<?php
							foreach ($produk['data'] as $p) : ?>
								<div class="col-md-6 col-lg-3 mb-4">
									<div class="position-relative">
										<div style="height: 250px">
											<img src="<?=$p['uri']?>" alt="" class="d-block mx-auto img-fluid img-thumbnail"
												 style="min-height: 250px; max-height: 250px; <?=$p['is_visible'] == 0 ? 'opacity: .5' : ''?>">
										</div>
									</div>
									<div class="pt-3">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-7">
													<p class="mb-2"><a href="product/detail/<?= $p['id_m_products'] ?>"
																						 class="font-weight-bold text-primary" <?= $p['is_visible'] == 0 ? 'style="opacity: .5"' : '' ?>><?= $p['product_name'] ?></a>
													</p>
													<div class="clearfix">
														<div
															class="d-inline-block text-danger" <?= $p['is_visible'] == 0 ? 'style="opacity: .5"' : '' ?>>
															Rp. <?= number_format($p['price'], '2', ',', '.') ?>
														</div>
													</div>
												</div>
												<div class="col-lg-5">
													<div class="btn-group">
														<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
																		aria-haspopup="true" aria-expanded="false">
															Aksi
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item"
																 href="<?= base_url('admin/product/') ?>detail/<?= $p['id_m_products'] ?>">Detail</a>
															<a class="dropdown-item"
																 href="<?= base_url('admin/product/') ?>foto/<?= $p['id_m_products'] ?>">Foto</a>
															<a class="dropdown-item"
																 href="<?= base_url('admin/product/') ?>ubah/<?= $p['id_m_products'] ?>">Ubah</a>
<!--															<a class="dropdown-item" href="--><?//= base_url('admin/product/') ?><!--hapus/--><?//= $p['id_m_products'] ?><!--">-->
<!--																Hapus-->
<!--															</a>-->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer', array(
	'js' => '
	<script>
	let page = 1
	$("#button-search").click(function () {
		let keyword = $("#input-search-product").val()
		let url = "' . base_url("admin/product/index/1/") . '" + keyword
		console.log(url)
		$(location).attr("href", url)
	})
	</script>'
));
?>
