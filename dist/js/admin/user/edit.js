let id = window.location.href.split('/');
id = id[id.length - 1];

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
				toastr.error(response.message);
			}
		},
	});
}

$('#user-form').on('submit', function (e) {
	e.preventDefault();

	const formData = new FormData(this);
	
	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/user/update/${id}`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-add-user', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				toastr.success(response.message);
				setTimeout(function () {
					window.location.href = global.base_url + 'admin/user';
				}, 2000);
			} else {
				toastr.error(response.message);
			}
		},
		complete: function () { 
			global.loading('btn-add-user', 'primary', false, 'Submit');
		}
	});
});

function fillForm(data) {
	$('#full_name').val(data.full_name);
	$(`input[name=gender][value=${data.gender}]`).prop('checked', true);
	$('#phone_number').val(data.phone_number);
	$(`input[name=type][value=${data.type}]`).prop('checked', true);
	const date = new Date(data.date_of_birth);
	$('#date_of_birth').val(data.date_of_birth);
	$('#date_of_birth').datepicker('update', date);
}
