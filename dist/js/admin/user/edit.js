let id = window.location.href.split('/');
id = id[id.length - 1];

$(document).ready(function () {
	initOptionPlugin();
	getUser();
});

function initOptionPlugin() {
	$('#date_of_birth').datepicker({ format: 'yyyy-mm-dd' });
}

function getUser() {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/user/getUser?id=${id}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				fillForm(response.data);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
	});
}

$('#user-form').on('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);

	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/user/updateUser/${id}`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-edit-user', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				tata.success('Sukses', 'Berhasil mengubah data user');
				setTimeout(function () {
					window.location.href = global.base_url + 'admin/user';
				}, 1000);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () { 
			global.loading('btn-edit-user', 'primary', false, 'Simpan');
		}
	});
});

$('#btn-ban-user').on('click', function () { 
	const userForm = document.getElementById('user-form');
	const formData = new FormData(userForm);
	formData.set('type', '2');
	
	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/user/updateUser/${id}`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-ban-user', 'danger', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				tata.success('Sukses', 'Berhasil me-nonaktifkan user');
				$('#user-ban-modal').modal('hide')
				setTimeout(function () {
					window.location.href = global.base_url + 'admin/user';
				}, 1000);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-ban-user', 'danger', false, 'Ya Banned');
		},
	});
});

function fillForm(data) {
	if (data.type === '0') $('#level-field-container').hide();
	
	$('#full_name').val(data.full_name);
	$('#email').val(data.email);
	$(`input[name=gender][value=${data.gender}]`).prop('checked', true);
	$('#phone_number').val(data.phone_number);
	$(`input[name=type][value=${data.type}]`).prop('checked', true);
	const date = new Date(data.date_of_birth);
	$('#date_of_birth').val(data.date_of_birth);
	$('#date_of_birth').datepicker('update', date);
}
