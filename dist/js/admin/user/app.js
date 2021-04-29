let paginate = 0;

function getUsers(search = '', page = 0, orderBy = 'id', orderDirection = 'DESC') {
	$.ajax({
		type: 'GET',
		url: `${global.base_url}/admin/user/getUser?search=${search}&page=${page}0&order-by=${orderBy}&order-direction=${orderDirection}`,
		success: function (response) {
			response = JSON.parse(response);
			console.log(response);
			if (response.code === 200) {
				renderUserData(response.data);
			}else {
				toastr.error(response.message);
			}
		},
	});	
}

function renderUserData(users) {
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

function searchUser() {
	getUsers($('#input-search-user').val());
}

function prevPagination() {
	if (paginate > 0) {
		paginate -= 1;
	}
	getUsers($('#input-search-user').val(), paginate);
}

function nextPagination() {
	paginate += 1;
	getUsers($('#input-search-user').val(), paginate);
}
