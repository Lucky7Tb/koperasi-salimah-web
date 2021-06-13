let page = 0
let searchKeyword = ''

function getProducts(
	search = '',
	page = 0
) {
	let url = global.base_url + 'admin/product/data/' + page + '/' + search

	if (page === 0) {
		$('#prev-button').addClass('disabled')
	} else {
		$('#prev-button').removeClass(['disabled'])
	}

	$.ajax({
		url: url,
		type: 'GET',
		success: function (res) {
			$('#data-products').html(res)
		}
	})
}

function initOptionPlugin() {
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

$('#button-search').click(function () {
	searchKeyword = $('#input-search-product').val();
	getProducts(searchKeyword, page)
})

$('#next-button').click(function () {
	page++
	getProducts(searchKeyword, page)
})

$('#prev-button').click(function () {
	if (page > 0) page--
	getProducts(searchKeyword, page)
})

