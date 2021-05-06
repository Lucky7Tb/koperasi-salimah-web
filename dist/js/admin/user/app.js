let paginate = 0;

function initOptionPlugin() {
	$.fn.datepicker.defaults.format = 'yyyy-mm-dd';
	$('#date_of_birth').datepicker();
	$('#photo').dropify({
		messages: {
			default: 'Seret dan lepas foto disini atau klik',
			replace: 'Seret dan lepas atau klik untuk mengganti foto',
			remove: 'Hapus',
			error:  'Opps, terjadi kesalahan'
		},
		error: {
			fileSize: 'Ukuran file foto terlalu besar ({{ value }} max).',
			imageFormat: 'Format foto yang di perbolehkan hanya ({{ value }}).',
		},
	});
}

function getUsers(search = '', page = 0, orderBy = 'id', orderDirection = 'DESC') {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}/admin/product/getProducts?search=${search}&page=${page}0&order-by=${orderBy}&order-direction=${orderDirection}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderProductData(response.data);
			}else {
				toastr.error(response.message);
			}
		},
	});
}

function renderProductData(users) {
	let content = '';
	$('#user-data-content').html('');

	if (users.length > 0) {
		users.forEach(user => {
			content += /*html*/ `
				<tr>
					<td>${user.full_name}</td>
					<td>${user.gender === 'l' ? 'Laki-laki' : 'Perempuan'}</td>
					<td>${user.phone_number ? user.phone_number : '-'}</td>
					<td>
						<span class="badge badge-pill badge-${user.type == 'Admin' ? 'primary' : 'secondary'}">${user.type}</span>
					</td>
					<td>
						<a class='btn btn-warning text-white'>	
							<i class='icon-pencil'></i>
						</a>
					</td>
				</tr>
			`;
		});
	}else {
		content += /*html*/ `
			<tr>
				<td colspan='6' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		paginate -= 1;
	}

	$('#user-data-content').append(content);
}

$('#button-search').on('click', function () {
	getUsers($('#input-search-user').val());
})

$('#prev-button').on('click', function () {
	if (paginate > 0) {
		paginate -= 1;
	}
	getUsers($('#input-search-user').val(), paginate);
});

$('#next-button').on('click', function () {
	paginate += 1;
	getUsers($('#input-search-user').val(), paginate);
});

$('#user-form').on('submit', function (e) {
	e.preventDefault();
	const formData = new FormData(this);
	$.ajax({
		type: 'POST',
		url: `${global.base_url}/admin/user/insert`,
		data: formData,
		processData: false,
		contentType: false,
		success: function (response) {
			console.log(JSON.parse(response));
		},
	});
});
