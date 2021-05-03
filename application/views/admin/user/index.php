<?php
$plugin = base_url('dist/vendors');
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
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/user/create') ?>">Tambah user</a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
							<div id="example_filter" class="dataTables_filter">
								<div class="float-right">
									<label>
										Search:
										<input type="search" class="form-control form-control-sm" id="input-search-user">
									</label>
									<button class="btn btn-primary" id="button-search">search</button>
								</div>
							</div>
							<table id="user-table" class="display table table-striped table-bordered" role="grid">
								<thead>
									<tr role="row">
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
								<tbody id="user-data-content">

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
$this->load->view('admin/template/footer', [
	'js' => '
			<script src="' . $plugin . '/slimscroll/jquery.slimscroll.min.js"></script>
			<script src="' . $js . '/global.js"></script>
			<script src="' . $js . '/admin/user/app.js"></script>
			<script>
				// $("#main").slimScroll({
				// 	height: "350px"
				// });
				getUsers();
			</script>
		'
]);
?>
