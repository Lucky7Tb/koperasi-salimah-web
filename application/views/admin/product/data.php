<?php
//if (!empty($produk['data'])) :
foreach ($produk['data'] as $p) : ?>
	<div class="col-md-6 col-lg-3 mb-4">
		<div class="position-relative">
			<img src="<?= $p['uri'] ?>" alt="" class="img-fluid img-thumbnail d-block mx-auto"
					 style="max-height: 250px; <?= $p['is_visible'] == 0 ? 'opacity: .5' : '' ?>">
		</div>
		<div class="pt-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-7">
						<p class="mb-2"><a href="product/detail/<?= $p['id_m_products'] ?>"
															 class="font-weight-bold text-primary" <?= $p['is_visible'] == 0 ? 'style="opacity: .5"' : '' ?>><?= $p['product_name'] ?></a>
						</p>
						<div class="clearfix">
							<div class="d-inline-block text-danger" <?= $p['is_visible'] == 0 ? 'style="opacity: .5"' : '' ?>>
								Rp. <?= number_format($p['price'], '2', ',', '.') ?>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="btn-group">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= base_url('admin/product/') ?>detail/<?= $p['id_m_products'] ?>">Detail</a>
								<a class="dropdown-item"
									 href="<?= base_url('admin/product/') ?>foto/<?= $p['id_m_products'] ?>">Foto</a>
								<a class="dropdown-item"
									 href="<?= base_url('admin/product/') ?>ubah/<?= $p['id_m_products'] ?>">Ubah</a>
								<a class="dropdown-item"
									 href="<?= base_url('admin/product/') ?>hapus/<?= $p['id_m_products'] ?>">Hapus</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
endforeach;
//else :
//	echo $pageLen;
//endif;
?>
