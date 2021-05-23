let global = {
	base_url: $('#base-url').val(),
	loading: function (element, color, isLoading, content) {
		if (isLoading) {
			$(`#${element}`)
				.removeClass(`btn-${color}`)
				.addClass(`btn-gradient-${color}`)
				.attr("disabled", true)
				.html("")
				.prepend(
					'<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
				);
		} else {
			$(`#${element}`)
				.removeClass(`btn-gradient-${color}`)
				.addClass(`btn-${color}`)
				.removeAttr("disabled")
				.html(content);
			$(`#${element}`).find("span:first").remove();
		}
	},
	rupiahFormat: function (angka, prefix) {
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split = number_string.split(','),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : rupiah ? 'Rp. ' + rupiah : '';
	}
};

global.addToWishlist = function(idProduct) { 
	const formData = new FormData();
	formData.append('id_m_products', idProduct);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}wishlist/addWishlist`,
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
			}else {
				toastr.error(response.message);
			}
		}
	});
}
