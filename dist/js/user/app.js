$('.owl-carousel').owlCarousel({
	loop: true,
	nav: true,
	center: true,
	dots: true,
	autoplay: true,
	autoWidth: true,
	responsiveClass: true,
	autoplayHoverPause: true,
	margin: 50,
	items: 1,
	navText: [
		"<i class='bx bx-chevron-left'></i>",
		"<i class='bx bx-chevron-right'></i>",
	],
});

$('#Container').mixItUp();
