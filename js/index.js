$(function() {
	var windowHeight = $(window).height();
	var sectionHeight = windowHeight + 199;
	$('section').css('height', sectionHeight + 'px');
	$(window).resize(function() {
		windowHeight = $(window).height();
		sectionHeight = windowHeight + 199;
		$('section').css('height', sectionHeight + 'px');
	});

	var nav = $('nav');
	var navButtons = $('nav li');
	var aboutme = $('#section-aboutme h2');
	var profilePicture = $('#profile_picture');
	var links = $('#findmeontheweb > .link-wrapper');
	var tweets = $('.tweet');
	var tweetsPosY = [150, 120, 70, 100, 70, -30, -30, -50, -100, -70];

	$(nav).mouseover(function() {
		$(nav).animate({left: '0px'}, 300);
	}).mouseleave(function() {
		$(nav).animate({left: '-58px'}, 300);
	});

	var len = navButtons.length;
	for (var i = 0; i < len; i++) {
		$(navButtons[i]).click({index: i}, function(event) {
			$('html, body').animate({scrollTop: event.data.index * sectionHeight}, 500);
		});
	}

	$('.product').click(function() {
		$(this).text($(this).children('a').attr('href'));
	});
	/*
	 var len = links.length;
	 for (var i = 0; i < len; i++) {
	 $(links[i]).click(function() {
	 $(this).clearQueue().transition({rotateY: '180deg', top: '-400px', left: '-200px'}, 700);
	 return false;
	 });//.mouseleave(function() {
	 //	$(this).clearQueue().transition({rotateY: '0deg', y: '0px'}, 700);
	 //});
	 }
	 */
	$(window).scroll(function() {
		var scroll = $(this).scrollTop();
		$('#log').text($(window).height() + ' : ' + scroll);

		//nav.css('padding-top', 100 - (100 * scroll / ($(document).height() - windowHeight)) + 'px');

		/* --- aboutme --- */
		aboutme.css('right', (function(scroll) {
			if (scroll < sectionHeight - 50) {
				return -50;
			} else if (scroll < sectionHeight) {
				return (scroll - sectionHeight - 50) / 50;
			} else {
				return 50;
			}
		})(scroll) + 'px');

		$(profilePicture).css('opacity', (function(scroll) {
			if (scroll < 200) {
				return 0;
			} else if (scroll < sectionHeight) {
				return (scroll - 200) / windowHeight;
			} else {
				return 1;
			}
		})(scroll));

		/* --- find me on the web --- */
		var len = links.length;
		for (var i = 0; i < len; i++) {
			$(links[i]).css('bottom', (function(index, scroll) {
				if (scroll > 1100) {
					return 16;
					var pos = (scroll - 1100) * (0.6 + 0.1 * (6 - index)) + 16;
					return pos;
				} else if (scroll > 300) {
					var pos = scroll * 1.5 - 600 - index * 100;
					return pos > 16 ? 16 : pos;
				} else {
					return -120;
				}
			})(i, scroll) + 'px').css('left', (function(scroll, index) {
				return 0;
				if (scroll > 1100) {
					return (scroll - 1100) * 0.2 * index;
				} else {
					return 0;
				}
			})(scroll, i) + 'px');//.css('transform', 'perspective(1000px) rotateY(' + scroll + 'deg)');
		}
		/* --- find me on the web --- */

		/* --- tweets --- */
		if (scroll > sectionHeight + 200) {
			var percent = (scroll - windowHeight - 400) / windowHeight;
			if (percent > 2.2) {
				percent = 2.2;
			}
			var len = tweets.length;
			for (var i = 0; i < len; i++) {
				$(tweets[i]).css('bottom', tweetsPosY[i] + 100 * (percent * (1 + 0.25 * (i - 5)) - 0.8) + '%');
			}
		}
		/* --- tweets --- */
	});
});