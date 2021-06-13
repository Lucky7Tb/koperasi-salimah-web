<?php
$plugin = base_url('dist/vendors');
$css = base_url('dist/css');
$this->load->view('admin/template/header', [
	'css' => '
		<link rel="stylesheet" href="' . $plugin . '/fontawesome/css/all.min.css">
	'
]);
?>

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12 align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h1>Management User</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12 mt-3">
			<div class="card bottom">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-lg btn-primary" href="<?= base_url('admin/user/create') ?>">Tambah user</a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div class="float-left">
							<div class="form-group">
								<div class="row">
									<div class="col-6">
										<select name="filter" id="filter-user" class="form-control costume-select" style="width: 15em;">
											<option value="gender">Gender</option>
											<option value="full_name">Nama</option>
										</select>
									</div>
									<div class="col-6">
										<button class="btn btn-sm btn-primary ml-5" id="order-direction-button">
											<i class="fas fa-filter">a-z</i>
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="float-right">
							<label>
								Cari:
								<input type="text" class="form-control" id="input-search-user" placeholder="Cari...">
							</label>
							<button class="btn btn-primary" id="button-search">Cari</button>
						</div>
						<div class="table-responsive">
							<table id="user-table" class="display table table-striped table-bordered text-center" role="grid">
								<thead>
									<tr role="row">
										<th rowspan="2">#</th>
										<th rowspan="2">Nama</th>
										<th rowspan="2">Gender</th>
										<th rowspan="2">No telp</th>
										<th rowspan="2">Level</th>
										<th>Aksi</th>
									</tr>
									<tr>
										<th>Update</th>
									</tr>
								</thead>
								<tbody id="user-data-content" style="font-size: 14px;">

								</tbody>
							</table>
						</div>
						<div id="example_paginate">
							<ul class="pagination">
								<li class="paginate_button page-item previous">
									<button class="btn btn-lg page-link" id="prev-button">
										Kembali
									</button>
								</li>
								<li class="paginate_button page-item next">
									<button class="btn btn-lg page-link" id="next-button">
										Berikutnya
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
<?php
$js = base_url('dist/js');
$this->load->view('admin/template/footer', [
	'js' => '
		<script src="' . $js . '/admin/user/app.js"></script>
		<script>
			getUsers();
		</script>
	'
]);
?>
