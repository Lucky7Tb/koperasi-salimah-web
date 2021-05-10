let paginate = 0;
let numbering = 0;
let isNoData = false;

function getUsers(search = '', page = 0, orderBy = 'id', orderDirection = 'DESC') {
	let query = '';
	if (search) {
		query += `search=${search}&page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	}else {
		query += `page=${page}&order-by=${orderBy}&order-direction=${orderDirection}`;
	}

	$.ajax({
		type: 'GET',
		url: `${global.base_url}admin/user/getAllUsers?${query}`,
		success: function (response) {
			response = JSON.parse(response);
			if (response.code === 200) {
				renderUserData(response.data);
			} else {
				toastr.error(response.message);
			}
		},
	});	
}

function renderUserData(users) {
	let content = '';
	$('#user-data-content').html('');
	$('#prev-button').attr('disabled', paginate === 0);

	if (users.length > 0) {
		isNoData = false;
		users.forEach(user => {
			content += /*html*/ `
				<tr>
					<td>${++numbering}</td>
					<td>${user.full_name}</td>
					<td>${user.gender === 'l' ? 'Laki-laki' : 'Perempuan'}</td>
					<td>${user.phone_number ? user.phone_number : '-'}</td>
					<td>
						<span class="badge badge-pill badge-${user.type == 'Admin' ? 'primary' : 'secondary'}">${user.type}</span>
					</td>
					<td>
						<a href="${global.base_url}admin/user/edit/${user.id_m_users}" class='btn btn-warning text-white'>	
							<i class='icon-pencil'></i>
						</a>
					</td>
				</tr>
			`;
		});
		$("#next-button").attr("disabled", false);
	}else {
		isNoData = true;
		numbering -= (numbering % 10);
		content += /*html*/ `
			<tr>
				<td colspan='6' class='text-center'>Tidak ada data</td>
			</tr>
		`;
		$('#next-button').attr('disabled', true);
	}

	$('#user-data-content').append(content);
}

$('#button-search').on('click', function () {
	getUsers($('#input-search-user').val());
})

$('#prev-button').on('click', function () { 
		if (paginate > 0) {
			paginate--;
		}

		decNumbering();

		if ($('#input-search-user').val()) {
			getUsers($('#input-search-user').val(), paginate);
			return;
		}
		getUsers('', paginate);
});

$('#next-button').on('click', function () {
	paginate++;
	
	if ($('#input-search-user').val()) {
		getUsers($('#input-search-user').val(), paginate);
		return;
	}

	getUsers('', paginate);
});

function decNumbering() {
	const row = $('#user-data-content td').closest('tr').length;

	if (numbering % 10 === 0) {
		if (!isNoData) {
			numbering = numbering - row * 2;
		}
	} else {
		numbering = numbering - row - 10;
	}

}
