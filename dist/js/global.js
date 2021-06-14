var global = {
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

global.getCart = function(callback) {
	$.ajax({
	  url: `${global.base_url}cart/GetCart`,
	  type: 'POST',
	  data: {param1: 'value1'},
	  success: function(response) {
	    response = JSON.parse(response);
	    if (response.code === 200) {
	    	callback(response);
	    } else {
	    	toastr.error('Terjadi kesalahn pada server');
	    }
	  },
	});
}

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
				toastr.success('Berhasil menambah ke wishlist');
			}else {
				window.location.href = global.base_url + "auth"
			}
		}
	});
}

global.addToCart = function(idProduct, qtyProduct = 1) {
	const formData = new FormData();
	formData.append('id_m_products', idProduct);
	formData.append('qty', qtyProduct);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}cart/addToCart`,
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				toastr.success('Berhasil menambah ke keranjang');
			}else {
				window.location.href = global.base_url + "auth"
			}
		}
	});
}

global.getProvince = function(callback) {
	$.ajax({
		url: `${global.base_url}address/getProvinces`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.rajaongkir.status.code === 200) {
				callback(response.rajaongkir.results);
			}else {
				toastr.error(response.rajaongkir.status.description);
			}
		}
	});
}

global.getCities = function(provinceId, callback) {
	$.ajax({
		url: `${global.base_url}address/getCities?province=${provinceId}`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.rajaongkir.status.code === 200) {
				callback(response.rajaongkir.results);
			}else {
				toastr.error(response.rajaongkir.status.description);
			}
		}
	});
}

global.getSubdistricts = function(cityId, callback) {
	$.ajax({
		url: `${global.base_url}address/getSubdistricts?city=${cityId}`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.rajaongkir.status.code === 200) {
				callback(response.rajaongkir.results);
			}else {
				toastr.error(response.rajaongkir.status.description);
			}
		}
	});
}

global.getCurrentAddress = function(callback) {
	$.ajax({
		url: `${global.base_url}address/getCurrentAddress`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				callback(response.data);
			}
		}
	});
}

global.getAllAddress = function(callback) {
	$.ajax({
		url: `${global.base_url}address/getAllAddress`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				callback(response.data);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

global.addUpdateAddress = function(formData, callback) {
	const idAddress = $('#address_id').val();
	const endpoint = idAddress ? `updateAddress?id=${idAddress}` : 'addAddress';
	$.ajax({
		type: 'POST',
		url: `${global.base_url}address/${endpoint}`,
		processData: false,
		contentType: false,
		data: formData,
		beforeSend: function() {
			global.loading('btn-addUpdate-address', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				callback(response);
			}else {
				toastr.error(response.message);
			}
		},
		complete: function() {
			global.loading('btn-addUpdate-address', 'primary', false, 'Simpan');
		}
	});
}

global.updateAddress = function(formData, callback) {
	$.ajax({
		type: 'POST',
		url: `${global.base_url}address/updateAddress`,
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				callback(response);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

global.changeActiveAddress = function(idAddress, callback) {
	$.ajax({
		type: 'POST',
		url: `${global.base_url}address/changeActiveAddress?id_address=${idAddress}`,
		processData: false,
		contentType: false,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				callback(response);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

toastr.options = {
  "positionClass": "toast-top-center",
  "hideDuration": "500",
}