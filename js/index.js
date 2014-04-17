$(function() {
	var sectionHeight = $(window).height() + 200;
	$('section').css('height', sectionHeight + 'px');
	$(window).resize(function() {
		sectionHeight = $(window).height() + 200;
		$('section').css('height', sectionHeight + 'px');
	});

	var links = $('#findmeontheweb a');

	$(window).scroll(function() {
		var value = $(this).scrollTop();
		$('h1').text($(window).height() + ' : ' + value);
		var len = links.length;
		for (var i = 0; i < len; i++) {
			$(links[i]).css('bottom', (function(index, scroll) {
				if (scroll > 1100) {
					var pos = (scroll - 1100) * (0.6 + 0.1 * index) + 16;
					return pos;
				} else if (scroll > 300) {
					var pos = scroll * 1.2 - 600 - index * 100;
					return pos > 16 ? 16 : pos;
				} else {
					return -120;
				}
			})(i, value) + 'px');
		}
	});
});