$(function () {
	$('#button-search').on('click', function () {
		const search = $('#input-search-user').val()

		$.post(`${global.base_url}/admin/changeaccess`, {
			menuId: menuId,
			roleId: roleI
		}, function () {
			document.location.href = `${global.base_url}/admin/user/getUser?search=${search}&page=${page}0&order-by=${orderBy}&order-direction=${orderDirection}`
		})
	})
})
