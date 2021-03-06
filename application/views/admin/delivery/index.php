<?php
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
			<div class="card bottom">
				<div class="card-header justify-content-between align-items-center">
					<a type="button" class="btn btn-primary" href="<?= base_url('admin/delivery/tambah') ?>">Tambah
						<?= $title ?></a>
				</div>
				<div class="card-body" id="main">
					<div class="table-responsive">
						<div class="mb-3">
							<div class="row px-2 pt-2">
								<div class="col-2">
									<input type="search" class="form-control" id="input-search-delivery" placeholder="Cari..."
										value="<?= $key ?>">
								</div>
								<div class="col-3">
									<button class="btn btn-primary" id="button-search" type="submit">Cari</button>
								</div>
							</div>
						</div>
						<table id="user-table" class="display table table-striped table-bordered text-center" role="grid">
							<thead>
								<tr role="row">
									<th rowspan="2">#</th>
									<th rowspan="2" colspan="2">Nama Ekspedisi</th>
									<th rowspan="2">Kode Kurir</th>
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
								if ($pengiriman['data'] != null) :
									foreach ($pengiriman['data'] as $p) :
										?>
								<tr <?= $p['is_visible'] == 0 ? 'style="opacity: .7"' : '' ?>>
									<th><?= ++$page ?></th>
									<td><img src="<?= $p['uri'] ?>" width="100px"></td>
									<td><?= $p['name_expedition'] ?></td>
									<td><?= $p['courier_code'] ?></td>
									<td><?= $p['is_visible'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
									<td><?= date('d-M-Y H:s ', strtotime($p['created_at'])) ?></td>
									<td><?= date('d-M-Y H:s ', strtotime($p['updated_at'])) ?></td>
									<td>
										<a href="<?= base_url('admin/delivery/ubah/');
												echo $p['id'] ?>" class="btn btn-warning text-white" data-id="<?= $p['id'] ?>">
											<i class='fas fa-pencil-alt'></i>
										</a>
									</td>
									<td>
										<a href="<?= base_url('admin/delivery/hapus/');
												echo $p['id'] ?>" class="btn btn-danger text-white">
											<i class='fas fa-power-off'></i>
										</a>
									</td>
								</tr>
								<?php
									endforeach;
								else:
									?>
								<td colspan='9' class='text-center'>Tidak ada data</td>
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
<?php
$this->load->view('admin/template/footer', array(
	'js' => '
	<script>
	let page = 1
	$("#button-search").click(function () {
		let keyword = $("#input-search-delivery").val()
		let url = "' . base_url("admin/delivery/index/1/") . '" + keyword
		console.log(url)
		$(location).attr("href", url)
	})
	</script>'));
?>
