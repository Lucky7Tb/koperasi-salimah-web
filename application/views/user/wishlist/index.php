<?php
$userAssets = base_url('dist/user/assets');
$globalPlugin = base_url('dist/vendors');
$this->load->view('user/template/header');
?>

<!-- Delete wishlist modal -->
<div class="modal fade" id="deleteWishlistModal" tabindex="-1" aria-labelledby="deleteWishlistModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteWishlistModalLabel">Peringatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-delete-wishlist">
				<div class="modal-body">
					<p class="lead">Yakin ingin menghapus produk ini dari wishlist?</p>
					<input type="hidden" name="wishlist-id" id="wishlist-id">
				</div>
				<div class="modal-footer">
					<button type="button" class="default-btn btn btn-outline-secondary text-dark" data-dismiss="modal">Tutup</button>
					<button type="submit" class="default-btn btn btn-bg-three" id="btn-delete-wishlist">Ya, hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Add to cart modal -->

<div class="container-fluid site-width">
	<div class="row">
		<div class="col-12  align-self-center">
			<div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
				<div class="w-sm-100 mr-auto">
					<h2 class="mb-0">Wishlist Kamu</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12 mt-3">
			<section class="popular-product-area pt-100 pb-70">
				<div class="container">
					<div class="row pt-45" id="wishlist-container">

					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<?php
$js = base_url('dist/js');
$this->load->view('user/template/footer', [
	'js' => '
		<script src="'. $userAssets .'/js/mixitup.min.js"></script>
		<script src="' . $js . '/user/wishlist/app.js"></script>
		<script>
			getWishlist();
			$("#Container").mixItUp();
		</script>
	'
]);
?>
