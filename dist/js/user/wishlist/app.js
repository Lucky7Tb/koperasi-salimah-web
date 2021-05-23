function getWishlist() {
	jQuery.ajax({
	  url: `${global.base_url}wishlist/getWishlist`,
	  type: 'GET',
	  success: function(response) {
	    response = JSON.parse(response);
	   	if (response.code === 200) {
	   		renderWishlistData(response.data);
	   	}else {
	   		toastr.error(response.message);
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
				toastr.success(response.message);
				$('#deleteWishlistModal').modal('hide');
				getWishlist();
			}else {
				toastr.error(response.message);
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
			let starRating = '';

			if (parseInt(wish.product.star_rating) > 0) {
				for (
					let index = 0;
					index < parseInt(wish.product.star_rating);
					index++
				) {
					startRating += `
					<li class="list-inline-item"><i class="icon-star"></i></li>
				`;
				}
			} else {
				starRating = '<strong>Belum ada rating</strong>';
			}

			content += `
			<div class="col mb-2">
				<div class="card h-100">
					<div class="img-fluid card-img-top mx-auto" style="width: 150px; height: 150px; background-image: url('${wish.product.uri}'); background-size: cover">
					</div>
					<div class="card-body">
						<h6 class="card-title">${wish.product.product_name}</h5>
							<p class="card-text text-muted">
								${wish.product.description}
							</p>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<p class="font-weight-bold text-danger">
								Harga: Rp. ${global.rupiahFormat(wish.product.price)}
							</p>
						</li>
						<li class="list-inline list-group-item">
							Rating:
							<ul class="list-inline mb-0 mt-2">
								${starRating}
							</ul>
						</li>
					</ul>
					<div class="card-body">
						<div class="row text-center">
							<div class="col-6">
								<button class="btn btn-lg btn-block btn-danger p-2" data-toggle="modal" data-target="#deleteWishlistModal" onclick="confirmDeleteWishlist(${wish.id})">
									Hapus <i class="icon-trash"></i>
								</button>
							</div>
							<div class="col-6">
								<button class="btn btn-lg btn-block btn-primary p-2" onclick="global.addToCart(${wish.product.id_m_products})">
									Cart <i class="icon-basket"></i>
								</button>
							</div>
						</div>
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