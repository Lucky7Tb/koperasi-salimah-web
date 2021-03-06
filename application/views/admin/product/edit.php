<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/dropify/css/dropify.min.css">
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2.min.css">
		<link rel="stylesheet" href="' . $plugin . '/select2/css/select2-bootstrap.min.css">
	'
]);
?>
<div class="container">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Ubah Produk</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-header  justify-content-between align-items-center">
					<a type="button" class="btn btn-outline-secondary" href="<?= base_url('admin/product') ?>">Kembali</a>
				</div>
				<div class="card-body">
					<form class="row col-12" method="post" enctype="multipart/form-data">
						<?php
							$kategori = $produk['data']['categories'];
							$produk = $produk['data']['product'];
							$namaProduk = $produk['product_name'];
							$harga = $produk['price'];
							$stok = $produk['stock'];
							$berat = $produk['weight'];
							$deskripsi = $produk['description'];
							$uri = $produk['uri'];
							$status = $produk['is_visible'];
						?>
						<div class="col-12 col-sm-4">
							<div class="card">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h4 class="card-title">Foto Produk</h4>
								</div>
								<div class="card-body">
									<input name="cover" class="dropify" id="photo" type="file" data-max-file-size="2M"
										data-max-file-size-preview="2M" data-allowed-file-extensions="png jpg jpeg"
										data-default-file="<?= $uri ?>">
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-8">
							<div class="form-group row mb-2">
								<label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nama_produk" placeholder="Nama Produk"
										value="<?= set_value('product_name', $namaProduk) ?>" name="product_name">
									<?= form_error('product_name', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="harga" class="col-sm-2 col-form-label">Harga</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="harga" placeholder="Rp 00.000,00"
										value="<?= set_value('price', $harga) ?>" name="price">
									<?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
								<div class="col-sm-10">
									<select id="kategori" class="form-control" name="categories[]" multiple="multiple">
										<?php
											foreach ($category['data'] as $c) {
												foreach ($kategori as $productKategori) {
													if ($productKategori['id_m_categories'] === $c['id']) {
														echo $c['category']. ' selected<br>';
														$isPrinted = true;
														break;
													}
												}
												if (!$isPrinted) {
													echo $c['category']. ' not selected<br>';
												}
											}
										?>
										<?php foreach ($category['data'] as $c) : ?>
											<?php $isPrinted = false; ?>
											<?php foreach ($kategori as $kategoriProduk): ?>
												<?php if ($c['id'] === $kategoriProduk['id_m_categories']) : ?>
													<option value="<?= $c['id'] ?>" selected>
														<?= $c['category'] ?>
													</option>
													<?php $isPrinted = true; ?>
												<?php endif; ?>
											<?php endforeach; ?>
											<?php if (!$isPrinted) : ?>
												<option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="stok" class="col-sm-2 col-form-label">Stok</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="stok" placeholder="000"
										value="<?= set_value('stock', $stok) ?>" name="stock">
									<?= form_error('stock', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="weight" class="col-sm-2 col-form-label">Berat</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" id="weight" placeholder="000 gram"
										value="<?= set_value('weight', $berat) ?>" name="weight">
									<?= form_error('weight', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea name="description" id="deskripsi" cols="80" rows="5"
										class="form-control"><?= set_value('description', $deskripsi) ?></textarea>
									<?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
								</div>
							</div>
							<div class="form-group row mb-2">
								<label for="weight" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<?php for ($i = 0; $i < 2; $i++) : ?>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="is_visible" id="status<?= $i ?>"
											value="<?= $i ?>" <?= $i == $status ? 'checked' : '' ?>>
										<label class="form-check-label" for="status<?= $i ?>">
											<?= $i == 0 ? 'Tidak Aktif' : 'Aktif' ?>
										</label>
									</div>
									<?php endfor; ?>
								</div>
							</div>
						</div>
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $plugin . '/dropify/js/dropify.min.js"></script>
		<script src="' . $plugin . '/select2/js/select2.full.min.js"></script>
		<script src="' . $js . '/admin/product/app.js"></script>
		<script>
			$(document).ready(function() {
					$("#kategori").select2();
					initOptionPlugin();
			})
		</script>
	'
]);
?>
