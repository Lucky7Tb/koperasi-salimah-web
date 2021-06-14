<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header');

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

			<div class="card bottom">

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
								<div class="card-body">
									<div class="row p-2">
										<?php if ($photos != null): ?>
											<?php foreach($photos as $photo): ?>
												<div class="col-4">
													<img src="<?= $photo['uri'] ?>" alt="<?= $namaProduk ?>" class="img-fluid" width="200px">
												</div>
											<?php endforeach; ?>

										<?php else: ?>
											
											<h4>Tidak ada foto produk</h4>

										<?php endif; ?>
									</div>
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
								<div class="form-control" id="nama_produk"><?= $berat ?> gram</div>
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
								 <span class="badge badge-<?= $visible == 1 ? 'primary' : 'secondary' ?>"><?= $visible == 1 ? 'Aktif' : 'Tidak Aktif' ?></span>
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
$this->load->view('admin/template/footer');
?>
