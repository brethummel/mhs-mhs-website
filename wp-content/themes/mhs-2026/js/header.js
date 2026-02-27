// JavaScript Document

jQuery(document).ready(function($) { 	
	
	// console.log('header.js loaded successfully!');
	
	if ($(document).scrollTop() > 20) {
		$('header').addClass('scrolled');
	}
	
    $(window).scroll(function() {
        if ($(document).scrollTop() > 20) {
            $('header').addClass('scrolled');
        }
        else {
            $('header').removeClass('scrolled');
        }
    });
	
    $('header .hamburger .hamburger-container').on('click', function(event) {
        if (!$('.main-menu').hasClass('locked')) {
            if ($('.main-menu').hasClass('open')) {
                closeMenu();
            } else {
                $('.main-menu').addClass('locked');
                // $('header .hamburger img').attr("src", imageSrc);
				$('header').addClass('scrolled');
				$('header').addClass('menu-open');
                $('.main-menu').slideDown(250, function() {
                    $('.main-menu').removeClass('locked');
                    $('.main-menu').addClass('open');
                    $('body').addClass('no-scroll');
                });
            }
        }
	});
	
	let openTimer = null;
	let closeTimer = null;
	const isDesktop = window.matchMedia('(min-width: 992px)');

	// submenu rollover (desktop)
	$('.main-menu > ul > li').on('mouseenter', function(event) {
		if (!isDesktop.matches) return;
		console.log('rolled over a menu item in desktop!');

		if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }
		const $li = $(this);

		// Hovered a top-level item with NO submenu? Close any open submenu.
		if ($li.find('.drop').length === 0) {
			console.log('hiding all submenus!');
			$('header .main-menu li.open:has(.drop)')
				.removeClass('open')
				.children('.drop').stop(true, true).slideUp(200);
			return;
		}

		openTimer = setTimeout(function() {
			if ($('header .main-menu').hasClass('locked')) return;

			$('header .main-menu').addClass('locked');

			// Close any other open submenu first
			$('header .main-menu li.open:has(.drop)')
				.not($li)
				.removeClass('open')
				.children('.drop').stop(true, true).slideUp(200);

			$li.addClass('open');

			$li.children('.drop').stop(true, true).slideDown(200, function() {
					$('header .main-menu').removeClass('locked');
				});
		}, 120);
	});
	
	
	$('.main-menu > ul > li').on('mouseleave', function(event) {
		if (!isDesktop.matches) return;

		if (openTimer) { clearTimeout(openTimer); openTimer = null; }
		const $li = $(this);

		// Only close if it actually has a submenu
		if ($li.find('.drop').length === 0) return;

		closeTimer = setTimeout(function() {
			if ($('header .main-menu').hasClass('locked')) return;

			$li.removeClass('open');
			$li.children('.drop').stop(true, true).slideUp(200, function() {
					$('header .main-menu').removeClass('locked');
				});
		}, 220);
	});
	
	
	// submenu click (mobile)
	$('.main-menu > ul > li:has(.drop) > a').on('click', function(event) {
		if (isDesktop.matches) return; // only hijack on mobile

		var $li = $(this).parent();

		if (!$li.hasClass('open')) {
				event.preventDefault();
			$('.main-menu li.open:has(.drop)').removeClass('open').children('.drop').stop(true, true).slideUp(300);
			$li.addClass('open');
			$(this).siblings('.drop').stop(true, true).slideDown(300);
			} else {
			// optional: allow second tap to navigate instead of closing
			// (delete this block entirely if you want second tap to follow the link)
			event.preventDefault();
			$li.removeClass('open');
			$(this).siblings('.drop').stop(true, true).slideUp(300);
			}
	});
	
	
	window.closeMenu = function() {
		$('.main-menu').addClass('locked');
		$('.main-menu').slideUp(250, function() {
			// $('header .hamburger img').attr("src", imageSrc);
			$('.main-menu').removeClass('locked');
			$('.main-menu').removeClass('open');
			$('.main-menu li.open .drop').slideUp(300);
			$('.main-menu li.open').removeClass('open');
			$('body').removeClass('no-scroll');
			$('header').removeClass('menu-open');
			if ($(document).scrollTop() < 20) {
				$('header').removeClass('scrolled');
			}
		});
	}
	
	$(document).on('click', function(event) {
		const $target = $(event.target);
		if ($target.closest('header .hamburger').length) return;
		if ($target.closest('.main-menu').length) return;

		if (openTimer) { clearTimeout(openTimer); openTimer = null; }
		if (closeTimer) { clearTimeout(closeTimer); closeTimer = null; }

		$('header .main-menu li.open:has(.drop)')
			.removeClass('open')
			.children('.drop').stop(true, true).slideUp(200);

				$('header .main-menu').removeClass('locked');

		// If mobile menu is open, close it too
		if ($('.main-menu').hasClass('open')) {
			closeMenu();
        }            
    });
    
	
/*    $('header .hamburger img').on('click', function(event) {
        if (!$('header .main-menu').hasClass('locked')) {
            imageSrc = $('header .hamburger img').attr("src");
            if ($('header .main-menu').hasClass('open')) {
                $('header .main-menu').addClass('locked');
                $('header .main-menu').slideUp(250, function() {
                    imageSrc = imageSrc.replace("menu_close.png", "menu.png");
                    $('header .hamburger img').attr("src", imageSrc);
                    $('header .main-menu').removeClass('locked');
                    $('header .main-menu').removeClass('open');
                    $('body').removeClass('no-scroll');
                });
            } else {
                $('header .main-menu').addClass('locked');
                imageSrc = imageSrc.replace("menu.png", "menu_close.png");
                $('header .hamburger img').attr("src", imageSrc);
                $('header .main-menu').slideDown(250, function() {
                    $('header .main-menu').removeClass('locked');
                    $('header .main-menu').addClass('open');
                    $('body').addClass('no-scroll');
                });
            }
        }
	});*/
	
});