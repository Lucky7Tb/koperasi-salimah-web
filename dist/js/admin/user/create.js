function initOptionPlugin() {
	$("#date_of_birth").datepicker({ format: "yyyy-mm-dd" });
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

$("#user-form").on("submit", function (e) {
	e.preventDefault();
	const formData = new FormData(this);
	$.ajax({
		type: "POST",
		url: `${global.base_url}admin/user/insertUser`,
		data: formData,
		processData: false,
		contentType: false,
		beforeSend: function () {
			global.loading("btn-add-user", "primary", true, null);
		},
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				clearForm();
				toastr.success('Berhasil menambahkan user');
			} else {
				toastr.error('Terjadi kesalahan pada server');
			}
		},
		complete: function () {
			global.loading("btn-add-user", "primary", false, 'Simpan');
		},
	});
});

function clearForm() {
	$("#user-form").trigger("reset");
	let photoInput = $("#photo").dropify();
	photoInput = photoInput.data("dropify");
	photoInput.settings.defaultFile = "";
	photoInput.destroy();
	photoInput.init();
}
