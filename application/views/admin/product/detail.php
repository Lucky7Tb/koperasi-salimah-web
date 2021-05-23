<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
			<link rel="stylesheet" href="' . $plugin . '/jquery-datepicker/css/datepicker.min.css">
			<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
			<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		'
]);

$kategori = $produk['data']['categories'];
$photos = $produk['data']['photos'];
$produk = $produk['data']['product'];
$namaProduk = $produk['product_name'];
$harga = $produk['price'];
$stok = $produk['stock'];
$berat = $produk['weight'];
$deskripsi = $produk['description'];
$uri = $produk['uri'];
$visible = $produk['is_visible'];


?>
<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Detail Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<!-- START: Card Data-->
	<div class="row">
		<div class="col-12 mt-3">

			<div class="card">

				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/product') ?>">Kembali</a>
				</div>

				<div class="card-body">

					<div class="row">
						<div class="col">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Foto Produk</h4>
								</div>
								<div class="row">
									<div class="col">
										<img src="<?= $produk['uri'] ?>" alt="" width="200px">
									</div>
									<?php if ($photos != null) :
										foreach ($photos as $photo) :?>
											<div class="col">
												<img src="<?= $photo['uri'] ?>" alt="" width="200px">
											</div>
										<?php endforeach;
									endif ?>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row col-12 mt-3">
					<div class="col-12 col-sm-8 mx-auto">

						<div class="form-group row">
							<p class="col-sm-2 col-form-label">Nama Produk</p>
							<div class="col-sm-10">
								<div class="form-control" id="nama_produk"><?= $namaProduk ?></div>
							</div>
						</div>
						<div class="form-group row">
							<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
							<div class="col-sm-10">
								<ul id="kategori">
									<?php foreach ($kategori as $c) : ?>
										<li><?= $c['category'] ?></li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
						<div class="form-group row">
							<p class="col-sm-2 col-form-label">Harga Produk</p>
							<div class="col-sm-10">
								<div class="form-control" id="nama_produk">Rp. <?= number_format($harga, '2', ',', '.') ?></div>
							</div>
						</div>
						<div class="form-group row">
							<p class="col-sm-2 col-form-label">Stok Produk</p>
							<div class="col-sm-10">
								<div class="form-control" id="nama_produk"><?= $stok ?></div>
							</div>
						</div>
						<div class="form-group row">
							<p class="col-sm-2 col-form-label">Berat Produk</p>
							<div class="col-sm-10">
								<div class="form-control" id="nama_produk"><?= $berat ?> Kg</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
							<div class="col-sm-10">
									<textarea disabled name="description" id="deskripsi" cols="80" rows="5"
														class="form-control"><?= set_value('description', $deskripsi) ?></textarea>
								<?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="kategori" class="col-sm-2 col-form-label">Status</label>
							<div class="col-sm-10">
								<?= $visible == 1 ? 'Aktif' : 'Tidak Aktif' ?>
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
		<script src="' . $plugin . '/jquery-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script src="' . $js . '/global.js"></script>
		<script src="' . $js . '/admin/product/app.js"></script>
		<script>initOptionPlugin();</script>
	'
]);
?>
