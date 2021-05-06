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
			<div class="card">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary"
						 href="<?= base_url('admin/product/tambah') ?>">Tambah <?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
							<div id="example_filter" class="dataTables_filter">
								<label>
									Search:
									<input type="search" class="form-control form-control-sm" id="input-search-product"
												 autocomplete="off">
								</label>
								<button class="btn btn-primary" id="button-search" type="submit">search</button>
							</div>
							<table id="user-table" class="display table table-striped table-bordered" role="grid">
								<thead>
								<tr role="row">
									<th>#</th>
									<th>Foto</th>
									<th>Produk</th>
									<th>Harga</th>
									<th>Kategori</th>
									<th>Stok</th>
									<th>Tgl Ditambah</th>
									<th>Tgl Diubah</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody id="product-data-content">
								<?php
								if ($produk['data'] != null) :
									$i = 1;
									foreach ($produk['data'] as $p) :
										?>
										<tr>
											<td><?= $i ?></td>
											<td><img src="<?= $p['uri'] ?>" width="100px"></td>
											<td><?= $p['product_name'] ?></td>
											<td>Rp. <?= number_format($p['price'], '2', ',', '.') ?></td>
											<td><?php foreach ($p['categories'] as $c) : ?>
													Kategori <?= $c['category'] ?>
												<?php endforeach ?>
											</td>
											<td><?= $p['stock'] ?></td>
											<td><?= $p['created_at'] ?></td>
											<td><?= $p['updated_at'] ?></td>
											<td>
												<a href="<?= base_url('admin/product/ubah/') ?><?= $p['id_m_products'] ?>"
													 class="btn btn-warning text-white">
													<i class="icon-pencil mr-2 h6 mb-0"></i> Edit
												</a>
												<a href="<?= base_url('admin/product/') ?>hapus/<?= $p['id_m_products'] ?>"
													 class="btn btn-danger text-white">
													<i class="icon-trash mr-2 h6 mb-0"></i> Hapus
												</a>
											</td>
										</tr>
										<?php
										$i++;
									endforeach;
								else:
									?>
									<td colspan='10' class='text-center'>Tidak ada data</td>
								<?php
								endif;
								?>
								</tbody>
							</table>
							<div id="example_paginate">
								<ul class="pagination">
									<li class="paginate_button page-item previous">
										<button class="page-link" id="prev-button">
											Previous
										</button>
									</li>
									<li class="paginate_button page-item next">
										<button class="page-link" id="next-button">
											Next
										</button>
									</li>
								</ul>
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
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer', array(
		'js' => '<script src="' . $js . '/admin/product/app.js"></script>
		<script>getProduct()</script>'
	)
);
?>
