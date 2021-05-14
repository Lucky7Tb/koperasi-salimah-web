function getProfile() {
	$.ajax({
		type: "GET",
		url: `${global.base_url}admin/profile/getProfile`,
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

$('#form-update-photo').on('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);
		$.ajax({
			type: 'POST',
			url: `${global.base_url}admin/profile/changePhotoProfile`,
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
		url: `${global.base_url}admin/profile/changeProfile`,
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
