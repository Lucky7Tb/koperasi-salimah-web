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
									<th rowspan="2" colspan="2">Nama Ekspedisi</th>
									<th rowspan="2">Kode Kurir</th>
									<th rowspan="2">Dibuat pada</th>
									<th rowspan="2">Diubah pada</th>
									<th colspan="2">Aksi</th>
								</tr>
								<tr>
									<th>Update</th>
									<th>Delete</th>
								</tr>
								</thead>
								<tbody id="user-data-content">
								<?php
								if ($pengiriman['data'] != null) :
									$i = 1;
									foreach ($pengiriman['data'] as $p) :
										?>
										<tr>
											<th><?= $i ?></th>
											<td><img src="<?= $p['uri'] ?>" width="100px"></td>
											<td><?= $p['name_expedition'] ?></td>
											<td><?= $p['courier_code'] ?></td>
											<td><?= date('d-M-Y H:s ', strtotime($p['created_at'])) ?></td>
											<td><?= date('d-M-Y H:s ', strtotime($p['updated_at'])) ?></td>
											<td>
												<button type="button" class="btn btn-warning text-white" data-id="<?= $p['id'] ?>">
													<i class='icon-pencil'></i>
												</button>
											</td>
											<td>
												<button type="button" class="btn btn-danger text-white" data-id="<?= $p['id'] ?>">
													<i class='icon-trash'></i>
												</button>
											</td>
										</tr>
										<?php
										$i++;
									endforeach;
								else:
									?>
									<td colspan='7' class='text-center'>Tidak ada data</td>
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
