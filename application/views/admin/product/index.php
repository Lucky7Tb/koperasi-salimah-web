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

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/user/create') ?>">Tambah <?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
							<div id="example_filter" class="dataTables_filter">
								<label>
									Search:
									<input type="search" class="form-control form-control-sm" id="input-search-user">
								</label>
								<button class="btn btn-primary" id="button-search" type="submit">search</button>
							</div>
							<table id="user-table" class="display table table-striped table-bordered" role="grid">
								<thead>
								<tr role="row">
									<th rowspan="2">#</th>
									<th rowspan="2" colspan="2">Nama Produk</th>
									<th rowspan="2">Stok</th>
									<th rowspan="2">Harga</th>
									<th rowspan="2">Diskon</th>
									<th rowspan="2">Harga Diskon</th>
									<th rowspan="2">Deskripsi</th>
									<th colspan="2">Aksi</th>
								</tr>
								<tr>
									<th>Update</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody id="user-data-content">
								<?php
								if ($produk['data'] != null) :
									$i = 1;
									foreach ($produk['data'] as $p) :
										?>
										<tr>
											<td><?= $i ?></td>
											<td><?= $p['uri'] ?></td>
											<td><?= $p['product_name'] ?></td>
											<td><?= $p['stock'] ?></td>
											<td><?= $p['price'] ?></td>
											<td><?= $p['discount'] ?></td>
											<td><?= $p['price_after_discount'] ?></td>
											<td>
												<button type="button" class="btn btn-warning text-white" data-id="<?= $p['id'] ?>">
													<i class='icon-pencil'></i>
												</button>
											<td>
												<button type="button" class="btn btn-danger text-white" data-id="<?= $k['id'] ?>">
													<i class='icon-trash'></i>
												</button>
											</td>
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
$this->load->view('admin/template/footer');
?>
