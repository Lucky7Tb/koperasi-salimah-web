function initPlugiOption() {
	$("#date_of_birth").datepicker({ format: "yyyy-mm-dd" });
	$("select").select2({
		  dropdownParent: $('#address-create-modal')
	});
}

$('#province').on('change', function() {
	$.ajax({
		url: `${global.base_url}address/getCity`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.rajaongkir.status.code === 200) {
				$.each(response.rajaongkir.results, function(_, data) {
					$('#province').append(`
						<option value="${data.provinces_id}">${data.province}</option>
					`);
				});
			}else {
				toastr.error(response.message);
			}
		}
	});
});

function getMyData() {
	getProfile();
	getCurrentAddress();
	getAllAddress();
}

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

function getAllAddress() {
	$.ajax({
		url: `${global.base_url}address/getAllAddress`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				renderAllAddress(response.data);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function getCurrentAddress() {
		$.ajax({
		url: `${global.base_url}address/getCurrentAddress`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				renderCurrentAddress(response.data);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function getProvices() {
	$.ajax({
		url: `${global.base_url}address/getProvinces`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);
			if (response.rajaongkir.status.code === 200) {
				$.each(response.rajaongkir.results, function(_, data) {
					$('#province').append(`
						<option value="${data.provinces_id}">${data.province}</option>
					`);
				});
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function renderAllAddress(data) {
	$.each(data, function(_, address) {
		$('#address-container').append(`
			<div class="col mb-3">
				<div class="card h-100 bg-light" style="width: 18rem;">
					<div class="card-body">
						<address>
							${address.address}, ${address.city}, ${address.suburd}, ${address.province}
						</address>
						<hr>
						<p>Kode post: <strong>${address.postcode}</strong></p>
						<p>Status: <span class="badge badge-${address.is_active == '1' ? 'success' : 'secondary'}">${address.is_active == '1' ? 'Aktif' : 'Tidak aktif'}</span></p>
						<div class="text-center">
							<button class="card-link btn btn-lg btn-info">Ubah</button>
							<button class="card-link btn btn-lg btn-primary">Jadikan alamat aktif</button>
						</div>
					</div>
				</div>
			</div>
		`);
	});
}

function renderCurrentAddress(data) {
	$('address#address-active').text(`
		${data.address}, ${data.city}, ${data.suburd}, ${data.province}
	`);
	$('#address-active-post-code').html(`Kode pos: <strong>${data.postcode}</strong>`)
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

function clearForm() {
	$('#form-profile').trigger('reset');
	$('#form-update-photo').trigger('reset');
}