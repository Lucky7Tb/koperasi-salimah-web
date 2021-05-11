let paginate = 0;
let numbering = (paginate * 10) + 1;

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
		users.forEach(user => {
			content += /*html*/ `
				<tr>
					<td>${numbering++}</td>
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
	paginate = 0;
	getUsers($('#input-search-user').val(), paginate);
})

$('#prev-button').on('click', function () { 
		if (paginate > 0) {
			paginate--;
		}

		if ($('#input-search-user').val()) {
			getUsers($('#input-search-user').val(), paginate);
			updateNumbering(0);
			return;
		}
		getUsers('', paginate);
});

$('#next-button').on('click', function () {
	paginate++;
	
	if ($('#input-search-user').val()) {
		getUsers($('#input-search-user').val(), paginate);
		updateNumbering(0);
		return;
	}

	getUsers('', paginate);
});

function updateNumbering(page) {
	numbering = page * 10 + 1;
}
