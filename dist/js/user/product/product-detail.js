function getProductDetail(idProduct) {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}product/getDetailProduct?id=${idProduct}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				console.log(response.data);
				renderDetailProduct(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});
}

function renderDetailProduct(data) {
	$('#product_name').html(data.product.product_name);
	$('#product_price').html(`Rp. ${data.product.price}`);
	$('#product_description').html(data.product.description);
	$('#product_stock').html(`Stok: ${data.product.stock}`);

	if (data.categories.length > 0) {
		data.categories.forEach((category) => {
			$('#product_list_category').append(
				`<span class="body-color font-weight-normal">${category.category}</span>`
			);
		});
	} else {
		$('#product_list_category').append(
			`<span	span class="body-color font-weight-normal">-</span>`
		);
	}

	$('#product_list_photo').append(
		`<div class="carousel-item active">
			<img class="d-block w-100" src="${data.product.uri}">
		</div>`
	);

	if (data.photos.length > 0) {
		data.photos.forEach((photo, index) => {
			$('#product_list_photo').append(
				`<div class="carousel-item">
						<img class="d-block w-100" src="${photo.uri}">
					</div>`
			);
		});
	}

	if (parseInt(data.product.star_rating) > 0) {
		for (let index = 0; index < parseInt(data.product.star_rating); index++) {
			$('#product_rating').append(
				`<li class="list-inline-item"><i class="icon-star"></i></li>`
			);
		}
	} else {
		$('#product_rating').append(
			`<li class="list-inline-item">Belum ada rating</li>`
		);
	}
}
