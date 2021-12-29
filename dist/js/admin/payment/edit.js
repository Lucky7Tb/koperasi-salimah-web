let id = window.location.href.split('/');
id = id[id.length - 1];
let photo;

$(document).ready(function () {
	initPlugiOption();
	getPayment();
});

function initPlugiOption() {
	photo = $('#photo').dropify({
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
	photo = photo.data('dropify');
}

function getPayment() {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/payment/getPayment?id=${id}`,
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

$('#payment-thumbnail-form').on('submit', function (e) { 
	e.preventDefault();
	const formData = new FormData(this);
	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/payment/changePaymentThumbnail?id=${id}`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-change-thumbnail', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				$("#payment-thumbnail-modal").modal('hide');
				getPayment();
				tata.success('Sukses', 'Berhasil mengubah thumbnail pembayaran');
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-change-thumbnail', 'primary', false, 'Simpan');
		},
	});
});

$('#payment-form').on('submit', function (e) { 
	e.preventDefault()
	const formData = new FormData(this);
	$.ajax({
		type: 'POST',
		url: `${global.base_url}admin/payment/updatePayment?id=${id}`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading('btn-update-payment', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				tata.success('Sukses', 'Berhasil mengubah data pembayaran');
				setTimeout(function () { 
					window.location.href = global.base_url + 'admin/payment';
				}, 1000);
			} else {
				tata.error('Error', 'Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading('btn-update-payment', 'primary', false, 'Simpan');
		},
	});
});

function fillForm(data) {
	$('#bank_name').val(data.bank_name);
	$('#number_account').val(data.number_account);
	$('#bank_code').val(data.bank_code);
	$('#name_account_bank').val(data.name_account_bank);
	$('#is_visible').val(data.is_visible);

	photo.settings.defaultFile = data.uri;
	photo.destroy();
	photo.init();
}
