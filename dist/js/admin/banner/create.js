const urlRegex = '((http|https)://)(www.)?[a-zA-Z0-9@:%._\\+~#?&//=]{2,256}\\.[a-z]{2,6}\\b([-a-zA-Z0-9@:%._\\+~#?&//=]*)';
const regex = new RegExp(urlRegex);

function initOptionPlugin() {
	$("#photo").dropify({
		messages: {
			default: "Seret dan lepas foto disini atau klik",
			replace: "Seret dan lepas atau klik untuk mengganti foto",
			remove: "Hapus",
			error: "Opps, terjadi kesalahan",
		},
		error: {
			fileSize: "Ukuran file foto terlalu besar ({{ value }} max).",
			imageFormat: "Format foto yang di perbolehkan hanya ({{ value }}).",
		},
	});
}

$('#banner-form').on('submit', function(e) {
	e.preventDefault();

	const formData = new FormData(this);
	const url = formData.get('url');

	if (!url.match(regex)) {
		toastr.error('format link banner tidak benar. Harus diawali dengan http:// atau https://');
		return;
	}

	$.ajax({
		url: `${global.base_url}admin/banner/createBanner`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		beforeSend: function() {
			global.loading('btn-add-banner', 'primary', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				clearForm();
				toastr.success('Berhasil menambah banner');
			}else {
				toastr.error(response.message);
			}
		},
		complete: function() {
			global.loading('btn-add-banner', 'primary', false, 'Simpan');
		}
	});
});


function clearForm() {
	$("#banner-form").trigger("reset");
	let photoInput = $("#photo").dropify();
	photoInput = photoInput.data("dropify");
	photoInput.settings.defaultFile = "";
	photoInput.destroy();
	photoInput.init();
}