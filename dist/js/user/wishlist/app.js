function getWishlist() {
	jQuery.ajax({
	  url: `${global.base_url}wishlist/getWishlist`,
	  type: 'GET',
	  success: function(response) {
	    response = JSON.parse(response);
	   	if (response.code === 200) {
	   		renderWishlistData(response.data);
	   	}else {
	   		tata.error('Error', 'Terjadi kesalahan pada server');
	   	}
	  },
	});	
}

$('#form-delete-wishlist').on('submit', function (e) {
	e.preventDefault();
	const id = $('#wishlist-id').val();
	$.ajax({
		type: "DELETE",
		url: `${global.base_url}wishlist/deleteWishlist?id=${id}`,
		beforeSend: function () {
			global.loading('btn-delete-wishlist', 'danger', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if(response.code === 200) {
				tata.success("Sukses", "Sukses menghapus dari wishlist");
				$('#deleteWishlistModal').modal('hide');
				getWishlist();
			}else {
				tata.error('Error', 'Terjadi Kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-delete-wishlist', 'danger', false, 'Ya hapus');
		}
	});
});

function renderWishlistData(wishlist) {
	let content = '';
	$('#wishlist-container').html('');
	if (wishlist.length > 0) {
		wishlist.forEach((wish) => {
			content += `
			<div class="col-lg-3 col-sm-6 mix sale">
				<div class="popular-product-item">
					<a href="">
						<img src="${wish.product.uri}" alt="${wish.product.product_name}">
					</a>
					<div class="content">
						<h3>
							<a href="javascript:void(0)">
								${wish.product.product_name}
							</a>
						</h3>
						<span>
							<div class="d-inline-block text-danger card-text">Rp. ${global.rupiahFormat(
								wish.product.price
							)}</div>
						</span>
						<ul class="popular-product-action">
							<li>
								<a href="javascript:void(0);" data-toggle="modal" data-target="#deleteWishlistModal" onclick="confirmDeleteWishlist(${
									wish.id
								})">
									<i class='bx bx-trash'></i>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);"onclick="global.addToCart(${
									wish.product.id_m_products
								})">
									<i class='bx bx-cart'></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
		`;
		});
	}else {
		content += `
			<h3 class="center-text">Belum ada wishlist</h3>
		`
	}

	$('#wishlist-container').append(content);
}

function confirmDeleteWishlist(idWishlist) {
	$('#wishlist-id').val(idWishlist);
}
