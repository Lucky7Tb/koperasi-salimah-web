<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
	'
]);

$photos = $produk['data']['photos'];
$produk = $produk['data']['product'];
$uri = $produk['uri'];

?>
<div class="container">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Foto Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">

			<div class="card bottom">

				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-outline-secondary" href="<?= base_url('admin/product') ?>">Kembali</a>
				</div>

				<div class="card-body">

					<div class="row">
						<div class="col">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Foto Produk</h4>
								</div>
								<div class="row p-3">
									<div class="col-md-6 col-lg-3 mb-4">
										<div class="position-relative">
											<div style="height: 250px">
												<img src="<?=$produk['uri']?>" alt="<?=$produk['product_name']?>" class="img-fluid"
													width="250px" style="max-height: 250px; min-height: 250px">
											</div>
											<div class="pt-3">
												<p class="text-center">Cover</p>
											</div>
										</div>
									</div>
									<?php if ($photos != null) :
										foreach ($photos as $photo) :?>
									<div class="col-md-6 col-lg-3 mb-4">
										<div class="position-relative">
											<div style="height: 250px">
												<img src="<?=$photo['uri']?>" alt="<?=$produk['product_name']?>" class="img-fluid" width="250px"
													style="max-height: 250px; min-height: 250px">
											</div>
											<div class="caption-bg fade bg-transparent text-right">
												<div class="d-table w-100 h-100 ">
													<div class="d-table-cell align-bottom">
														<div class="mb-4">
															<a href="<?= base_url('admin/product/hapusFoto') . '/' . $photo['id_u_product_photos'] ?>"
																class="rounded-left bg-white px-3 py-2 shadow2"><i class="icon-minus"></i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endforeach;
									endif ?>
									<div class="col-md-6 col-lg-3 mb-4">
										<form action="<?= base_url('admin/product/tambahPhoto') . '/' . $produk['id_m_products'] ?>"
											class="position-relative" id="tambah-photo">
											<input name="cover" class="dropify" id="photo" type="file" data-max-file-size="2M"
												data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg" <div class="pt-3">
											<p class="text-center">Tambah</p>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>>
		<script src="' . $js . '/admin/product/app.js"></script>
		<script src="' . $js . '/admin/product/addPhoto.js"></script>
		<script>initOptionPlugin();</script>
	'
]);
?>
