let page = 0
let search = ''

function getProducts(search = '', page = 0) {
	let url = 'http://localhost/koperasi-salimah/admin/product/data/' + page + '/' + search

	if (page === 0) {
		$('#prev-button').addClass('disabled')
	} else {
		$('#prev-button').removeClass(['disabled'])
	}

	if (page % 3 === 0) {
		$('#page-1').addClass('active')
		$('#page-2').removeClass(['active'])
		$('#page-3').removeClass(['active'])
	} else if (page % 3 === 1) {
		$('#page-1').removeClass(['active'])
		$('#page-2').addClass('active')
		$('#page-3').removeClass(['active'])
	} else {
		$('#page-1').removeClass(['active'])
		$('#page-2').removeClass(['active'])
		$('#page-3').addClass('active')
	}

	$.ajax({
		url: url,
		type: 'GET',
		success: function (res) {
			$('#data-products').html(res)
		}
	})
}

$('#button-search').click(function () {
	search = $('#input-search-product').val()
	getProducts(search, page)
})

$('#next-button').click(function () {
	page++
	getProducts(search, page)
})

$('#prev-button').click(function () {
	if (page !== 0) {
		page--
		getProducts(search, page)
	}
})

