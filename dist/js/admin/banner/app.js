function getBanners() {
	$.ajax({
		url: `${global.base_url}admin/banner/getBanners`,
		type: 'GET',
		success: function(response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				renderBannerData(response.data);
			}else {
				toastr.error(response.message);
			}
		}
	});
}

function renderBannerData(banners) {
	let content  = '';

	$('#banner-data-content').html('');

	if (banners.length > 0) {
			$.each(banners, function(index, banner) {
		 		content += `
		 			<tr>
		 				<td>${index + 1}</td>
		 				<td>
		 					<a href='${banner.uri}' data-fancybox data-caption='${banner.url}'>
								<div style="width: 64px; height: 64px; background-size: cover; background-image: url('${banner.uri}'); background-position: center;" class='mx-auto'></div>
							</a>
		 				</td>
		 				<td>
		 					<a href="${banner.url}" class="btn btn-link" target="_blank" rel="noopener noreferrer nofollow">
		 						Buka link
		 					</a>
		 				</td>
		 				<td>${moment(banner.updated_at).format('DD-MMM-YYYY HH:mm')}</td>
		 				<td>
						<button class="btn btn-danger text-white" onclick="confirmDeleteBanner(${banner.id})">
							<i class='icon-trash'></i>
						</button>
					</td>
		 			</tr>
		 		`;
			});
	}else {
		content += `
			<tr>
				<td colspan="5">Tidak ada data</td>
			</tr>
		`
	}

	$('#banner-data-content').append(content);
}

function confirmDeleteBanner(idBanner) {
	$('#banner-delete-modal').modal('show');
	$('#id_banner').val(idBanner);
}

function deleteBanner() {
	const formData = new FormData();
	formData.append('idBanner', $('#id_banner').val());

	$.ajax({
		url: `${global.base_url}admin/banner/deleteBanner`,
		type: 'POST',
		processData: false,
		contentType: false,
		data: formData,
		beforeSend: function() {
			global.loading('btn-delete-banner', 'danger', true, null);
		},
		success: function (response) {
			response = JSON.parse(response);

			if (response.code === 200) {
				toastr.success('Berhasil menghapus banner');
				$('#banner-delete-modal').modal('hide');
				$('#id_banner').val('');
				getBanners();
			}else {
				toastr.error('Terjadi kesalahan pada server');
			}
		},
		complete: function() {
			global.loading('btn-delete-banner', 'danger', false, 'Ya, hapus');
		}
	});
}