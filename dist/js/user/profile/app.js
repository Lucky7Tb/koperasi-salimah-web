function initPlugiOption() {
	$("#date_of_birth").datepicker({ format: "yyyy-mm-dd" });
	$("select").select2({
		  dropdownParent: $('#address-modal')
	});
}

function getMyData() {
	getProfile();
	global.getCurrentAddress(renderCurrentAddress);
	global.getAllAddress(renderAllAddress);
}

$('#province').on('change', function() {
	$('#city').html('');
	const provinceId = this.value;

	global.getCities(provinceId, function(cities) {
		$.each(cities, function(_, city) {
			$('#city').append(`
				<option value="${city.city_id}">${city.type} - ${city.city_name}</option>
			`);
		});

		$('#city option:first').prop('selected', true);
		$('#city').trigger('change');
	});
});

$('#city').on('change', function() {
	$('#subdistrict').html('');
	const cityId = this.value;

	global.getSubdistricts(cityId, function(subdistricts) {
		$.each(subdistricts, function(_, subdistrict) {
			$('#subdistrict').append(`
				<option value="${subdistrict.subdistrict_id}">${subdistrict.subdistrict_name}</option>
			`);
		});

		$('#subdistrict option:first').prop('selected', true);
	});
});

$('#address-form').on('submit', function(e) {
	e.preventDefault();

	const formData = new FormData();
	formData.append('address', $('#address').val());
	formData.append('postcode', $('#postcode').val());
	formData.append('province_id', $('#province').val());
	formData.append('province', $('#province option:selected').text());
	formData.append('city_id', $('#city').val());
	formData.append('city', $('#city option:selected').text());
	formData.append('subdistrict_id', $('#subdistrict').val());
	formData.append('subdistrict', $('#subdistrict option:selected').text());

	global.addUpdateAddress(formData, function(response) {
		toastr.success(response.message)
		$('#address-modal').modal('hide');
		$('#address-form').trigger('reset');
		$('#address_id').val('');
		global.getCurrentAddress(renderCurrentAddress);
		global.getAllAddress(renderAllAddress);
	});
});

$('#form-update-photo').on('submit', function(e) {
	e.preventDefault();

	const formData = new FormData(this);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}profile/changePhotoProfile`,
		processData: false,
		contentType: false,
		data: formData,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
				getProfile();
				clearForm();
			} else {
				toastr.error(response.error);
			}
		}
	});
});

$('#form-profile').on('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}profile/changeProfile`,
		processData: false,
		contentType: false,
		data: formData,
		beforeSend: function () {
			global.loading('btn-change-profile', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
				getProfile();
			}else {
				toastr.error(response.error);
			}
		},
		complete: function () {  
			global.loading('btn-change-profile', 'primary', false, 'Simpan perubahan');
		}
	});
});

function getProfile() {
	$.ajax({
		type: "GET",
		url: `${global.base_url}profile/getProfile`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				fillForm(response.data);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function getDetailAddress(addressId) {
	$.ajax({
		type: "GET",
		url: `${global.base_url}address/getDetailAddress?id=${addressId}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				fillFormAddress(response.data); 	
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function showAddressModal() {
	$('#address-form').trigger('reset');
	$('#address_id').val('');
	$('#address-modal').modal('show');
	console.log($('#address_id').val());
	global.getProvince(function(provinces) {
		$.each(provinces, function(_, province) {
			$('#province').append(`
				<option value="${province.province_id}">${province.province}</option>
			`);
		});
		$('#province option:first').prop('selected', true);
		$('#province').trigger('change');
	})
}

function renderAllAddress(data) {
	$('#address-container').html('');
	$.each(data, function(_, address) {
		$('#address-container').append(`
			<div class="col mb-3">
				<div class="card h-100 bg-light" style="width: 18rem;">
					<div class="card-body">
						<address>
							${address.address}, ${address.city}, ${address.subdistrict}, ${address.province}
						</address>
						<hr>
						<p>Kode post: <strong>${address.postcode}</strong></p>
						<p>Status: <span class="badge badge-${address.is_active == '1' ? 'success' : 'secondary'}">${address.is_active == '1' ? 'Aktif' : 'Tidak aktif'}</span></p>
						
						<div>
							<button class="card-link btn btn-block btn-lg btn-primary" onclick="setActiveAddress(${address.id})">Jadikan alamat aktif</button>
						</div>
						<div class="mt-2">
							<button class="card-link btn btn-block btn-lg btn-outline-info" onclick="getDetailAddress(${address.id})">Ubah alamat</button>
						</div>
					</div>
				</div>
			</div>
		`);
	});
}

function renderCurrentAddress(data) {
	$('address#address-active').text(`
		${data.address}, ${data.city}, ${data.subdistrict}, ${data.province}
	`);
	$('#address-active-post-code').html(`Kode pos: <strong>${data.postcode}</strong>`)
}

function setActiveAddress(idAddress) {
	global.changeActiveAddress(idAddress, function(response) {
		toastr.success(response.message);
		global.getCurrentAddress(renderCurrentAddress);
		global.getAllAddress(renderAllAddress);
	});
}

function fillForm(data) {
	$('#full_name').val(data.full_name);
	$('#phone_number').val(data.phone_number);
	$(`input[name=gender][value=${data.gender}]`).prop('checked', true);
	const date = new Date(data.date_of_birth);
	$('#date_of_birth').val(data.date_of_birth);
	$('#date_of_birth').datepicker('update', date);
	$('#photo_profile').attr('src', data.uri);
}

function fillFormAddress(data) {
	$('#address_id').val(data.id);	
	$('#address').val(data.address);
	$('#postcode').val(data.postcode);

	global.getProvince(function(provinces) {
		$.each(provinces, function(_, province) {
			$('#province').append(`
				<option value="${province.province_id}">${province.province}</option>
			`);
		});

		$(`#province option[value=${data.province_id}]`).prop('selected', true);
	});

	global.getCities(data.province_id, function(cities) {
		$.each(cities, function(_, city) {
			$('#city').append(`
				<option value="${city.city_id}">${city.type} - ${city.city_name}</option>
			`);
		});

		$(`#city option[value=${data.city_id}]`).prop('selected', true);
	});

	global.getSubdistricts(data.city_id, function(subdistricts) {
		$.each(subdistricts, function(_, subdistrict) {
			$('#subdistrict').append(`
				<option value="${subdistrict.subdistrict_id}">${subdistrict.subdistrict_name}</option>
			`);
		});

		$(`#subdistrict option[value=${data.subdistrict_id}]`).prop('selected', true);
	});

	$('#address-modal').modal('show');
}

function clearForm() {
	$('#form-profile').trigger('reset');
	$('#form-update-photo').trigger('reset');
}