$(".btn").click(function() {
	$('html, body').animate({
		scrollDown: $('.msg').offset().down -100 }, 1000);
});