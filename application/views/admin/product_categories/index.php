<?php
$css = base_url('dist/css');
$this->load->view('admin/template/header');
?>
<div class="container mb-3">
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
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/product_Categories/tambah') ?>">Tambah
						<?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
							<div id="example_filter" class="dataTables_filter px-1 mt-2">
								<div class="d-flex flex-row justify-content-start mb-3">
									<div class="form-group" style="margin-right: 1em">
										<input type="search" class="form-control" id="input-search-category" placeholder="Cari kategori makanan" value="<?= $key ?>">
									</div>
									<div>
										<button class="btn btn-primary" id="button-search" type="submit">Cari</button>
									</div>
								</div>
							</div>
							<table id="user-table" class="display table table-striped table-bordered text-center" role="grid">
								<thead>
									<tr role="row">
										<th rowspan="2">#</th>
										<th rowspan="2">Kategori</th>
										<th rowspan="2">Deskripsi</th>
										<th rowspan="2">Status</th>
										<th rowspan="2">Dibuat pada</th>
										<th rowspan="2">Diubah pada</th>
										<th colspan="2">Aksi</th>
									</tr>
									<tr>
										<th>Update</th>
										<th>NonAktif</th>
									</tr>
								</thead>
								<tbody id="user-data-content">
									<?php
								if ($kategori['data'] != null) :
									$i = 1;
									foreach ($kategori['data'] as $k) :
										?>
									<tr <?= $k['is_visible'] == 0 ? 'style="opacity: .6"' : '' ?>>
										<td><?= ++$page ?></td>
										<td><?= $k['category'] ?></td>
										<td><?= $k['description'] ?></td>
										<td><?= $k['is_visible'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
										<td><?= date('d-M-Y H:s ', strtotime($k['created_at'])) ?></td>
										<td><?= date('d-M-Y H:s ', strtotime($k['updated_at'])) ?></td>
										<td>
											<a href="<?= base_url('admin/product_Categories/ubah/') ?><?= $k['id'] ?>"
												class="btn btn-warning text-white">
												<i class='fas fa-pencil-alt'></i>
											</a>
										</td>
										<td>
											<a href="<?= base_url('admin/product_Categories/hapus') ?>/<?= $k['id'] ?>"
												class="btn btn-danger text-white">
												<i class='fas fa-power-off'></i>
											</a>
										</td>
									</tr>
									<?php
										$i++;
									endforeach;
								else:
									?>
									<td colspan='8' class='text-center'>Tidak ada data</td>
									<?php
								endif;
								?>
								</tbody>
							</table>
							<div id="example_paginate">
								<?= $this->pagination->create_links(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahKategoriModalLabel">Tambah <?= $title ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="user-form">
					<div class="form-group">
						<label for="full_name">Nama kategori</label>
						<input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
							placeholder="Masukan nama kategori">

					</div>
					<div class="form-group">
						<label for="full_name">Deskripsi kategori</label>
						<input type="text" name="deskripsi" id="deskripsi" class="form-control"
							placeholder="Masukan deskripsi kategori">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$plugin = base_url('dist/vendors');
$this->load->view('admin/template/footer', [
	'js' => '
		<script>
			let page = 1
			$("#button-search").click(function () {
			let keyword = $("#input-search-category").val()
			let url = "' . base_url("admin/product_Categories/index/1/") . '" + keyword
			console.log(url)
			$(location).attr("href", url)
			})
		</script>'
]);
?>
