function addToCart(idProduct) {
	global.addToCart(idProduct, $('#product-qty').val());
}

$('#product-qty').on('change', function () {
	if(parseInt(this.value) <= 0) this.value = 1;
})
