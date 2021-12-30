function addToCart(idProduct) {
	global.addToCart(idProduct, $('#product-qty').val());
}

$('#product-qty').on('change', function () {
	if(parseInt(this.value) <= 0) this.value = 1;
})

$(document).ready(function() {
	$('.owl-carousel').owlCarousel({
		nav: true,
		center: true,
		dots: true,
		autoWidth: true,
		responsiveClass: true,
		autoplayHoverPause: true,
		margin: 50,
		navText: [
			"<i class='bx bx-chevron-left'></i>",
			"<i class='bx bx-chevron-right'></i>",
		],
	});

	$('#Container').mixItUp();
});
