$('#photo').on('input', function () {
	const fd = new FormData()
	const photo = $('#photo')[0].files

	if (photo.length > 0) {
		fd.append('photo', photo[0])

		$.ajax({
			url: $('#tambah-photo').attr('action'),
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function (res) {
				// console.log(res)
				window.location.href = res
			}
		})
	}
})
