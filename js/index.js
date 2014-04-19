$(function() {
	/* --- Twitter settings --- */
	twttr.widgets.createTimeline(
			'123456',
			document.getElementById('timeline'),
			function(el) {
				console.log("Embedded a timeline.")
			},
			{
				width: '450',
				height: '700',
				related: 'benward,endform,brianellin'
			}
	);
	/* --- Twitter settings --- */


	var sectionHeight = $(window).height() + 200;
	$('section').css('height', sectionHeight + 'px');
	$(window).resize(function() {
		sectionHeight = $(window).height() + 200;
		$('section').css('height', sectionHeight + 'px');
	});

	var nav = $('nav');
	var aboutme = $('#ct-aboutme h2');
	var links = $('#findmeontheweb > .link-wrapper');

	$(window).scroll(function() {
		var scroll = $(this).scrollTop();
		$('#log').text($(window).height() + ' : ' + scroll);

		/* --- navigation --- */
		$('nav').css('top', (scroll * 0.8 - 71 > 0 ? 0 : scroll * 0.8 - 71) + 'px');

		/* --- aboutme --- */
		aboutme.css('top', (function(scroll) {
			if (scroll < 200 + sectionHeight * 0.2) {
				return 110;
			} else if (scroll < sectionHeight * 0.8) {
				//return 160 - ((100 * scroll / (0.6 * sectionHeight - 200)) + (100 * (0.6 * sectionHeight - 200) / (0.6 * sectionHeight + 200)));
			} else {
				return 10;
			}
		})(scroll) + '%');

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
			})(scroll, i) + 'px');
		}
	});
});