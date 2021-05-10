$(function () {
	let page = 0

	$('#button-search').click(function () {
		let keyword = $('#input-search-product').val()

		$.ajax({
			url: 'http://localhost/koperasi-salimah/admin/product/cari',
			method: 'post',
			data: {
				keyword: keyword,
				page: page
			},
			success: function (data) {
				console.log(data)
				$(document).html(data)
			}
		})
	})
})
