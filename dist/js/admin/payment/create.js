function initPlugiOption() {
	$('#photo').dropify({
		messages: {
			default: 'Seret dan lepas foto disini atau klik',
			replace: 'Seret dan lepas atau klik untuk mengganti foto',
			remove: 'Hapus',
			error: 'Opps, terjadi kesalahan',
		},
		error: {
			fileSize: 'Ukuran file foto terlalu besar ({{ value }} max).',
			imageFormat: 'Format foto yang di perbolehkan hanya ({{ value }}).',
		},
	});
}

$('#payment-form').on('submit', function (e) {
	e.preventDefault();
	const formData = new FormData(this);
	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/payment/insertPayment`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-add-payment', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				clearForm();
				toastr.success(response.message);
			} else {
				toastr.error(response.message);
			}
		},
		complete: function () {
			global.loading('btn-add-payment', 'primary', false, 'Simpan');
		},
	});
});

function clearForm() {
	$('#payment-form').trigger('reset');
	let photoInput = $('#photo').dropify();
	photoInput = photoInput.data('dropify');
	photoInput.settings.defaultFile = '';
	photoInput.destroy();
	photoInput.init();
}
