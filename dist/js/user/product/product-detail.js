function addToWishlist(idProduct) {
	const formData = new FormData();
	formData.append('id_m_products', idProduct);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}wishlist/addWishlist`,
		processData: false,
		contentType: false,
		data: formData,
		beforeSend: function () {
			global.loading('btn-add-wishlist', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
			}else {
				toastr.error(response.message);
			}
		},
		complete: function () {
			global.loading(
				'btn-add-wishlist',
				'primary',
				false,
				'Tambah ke Wishlist <i class="icon-heart"></i>'
			);
		}
	});
}
