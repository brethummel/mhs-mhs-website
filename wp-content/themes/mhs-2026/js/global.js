// JavaScript Document

function countUp(element) {
	mystart = parseFloat(element.text());
	myend = parseFloat(element.data('value'));
	myinc = parseFloat(element.data('inc'));
	if (myinc == 1) {
		jQuery({ countNum: element.text()}).animate({
			countNum: myend
		},
		{
			duration: 1500,
			easing: 'swing',
			step: function() {
				element.text(Math.floor(this.countNum).toLocaleString("en"));
			},
			complete: function() {
				element.text(this.countNum.toLocaleString("en"));
			}
		});
	}
	if (myinc == 0.1) {
		jQuery({ countNum: element.text()}).animate({
			countNum: myend
		},
		{
			duration: 1500,
			easing: 'swing',
			step: function() {
				element.text(parseFloat(this.countNum).toFixed(1));
			},
			complete: function() {
				element.text(this.countNum);
			}
		});
	}
}


jQuery(window).load(function($) {
	
	// ****************** FOR STATS COUNT-UP ****************** //
	
	jQuery.fn.isInViewport = function() {
	    var elementTop = jQuery(this).offset().top;
	    var elementBottom = elementTop + jQuery(this).outerHeight();

	    var viewportTop = jQuery(window).scrollTop();
	    var viewportBottom = viewportTop + jQuery(window).height();

	    return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	
	if (jQuery('.count-up').length > 0) {
		var myval;
		jQuery('span.count-up').each(function(event) {
			myval = jQuery(this).text();
			mystart = '0';
			mydist = jQuery(this).offset().top;
			mythresh = mydist - (jQuery(window).height() * .80);
			jQuery(this).attr('data-value', myval);
			jQuery(this).attr('data-dist', mydist);
			jQuery(this).attr('data-thresh', mythresh);
			jQuery(this).text(mystart);
		});
		jQuery('span.count-up').each(function(event) {
			if (jQuery(this).isInViewport() && !jQuery(this).hasClass('counted')) {
				jQuery(this).addClass('counted');
				countUp(jQuery(this));
			}
		});
	}
	
	// ****************** END STATS COUNT-UP ****************** //
			
});

jQuery(document).ready(function($) {
	
	// console.log('global.js loaded successfully!');

	// ****************** FOR STATS COUNT-UP ****************** //

	$.fn.isInViewport = function() {
	    var elementTop = $(this).offset().top;
	    var elementBottom = elementTop + $(this).outerHeight();

	    var viewportTop = $(window).scrollTop();
	    var viewportBottom = viewportTop + $(window).height();

	    return elementBottom > viewportTop && elementTop < viewportBottom;
	};
	
	if ($('.count-up').length > 0) {
		$(window).scroll(function(event) {
			// console.log('scrollTop: ' + $(window).scrollTop());
			$('span.count-up').each(function(event) {
				mythresh = parseInt($(this).data('thresh'));
				// console.log($(this).parent().attr('class') + ': ' + mythresh);
				if ($(window).scrollTop() >= mythresh && !$(this).hasClass('counted')) {
					$(this).addClass('counted');
					countUp($(this));
				}
			});
		});
	}
	
	// To count up a stat, you must surround the number with a <span></span> tag,
	// making sure to include class="count-up" and then a data attribute for the
	// increment desired (either "1" or "0.1") as such: data-inc="1". Example:
	// <span class="count-up" data-inc="1">62</span>. If there is a "units" (like,
	// "62k"), also surround the unit with a <span class="label">k</span> such that
	// <span class="count-up" data-inc="1">62</span><span class="label">k</span>
	
	// ****************** END STATS COUNT-UP ****************** //
	
});
