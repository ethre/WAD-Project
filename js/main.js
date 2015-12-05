jQuery(document).ready(function($){
	//open-close submenu on mobile
	$('.cd-main-nav').on('click', function(event){
		if($(event.target).is('.cd-main-nav')) $(this).children('ul').toggleClass('is-visible');
	});
});

/*
 * Easy Z modal
 * doc: http://markusslima.github.io/easy-z-modal/
 * github: https://github.com/markusslima/easy-z-modal
 *
 * Copyright (c) 2015 Markus Vinicius da Silva Lima
 * Version 0.1.3
 * Licensed under the MIT license.
 */
(function ($) {
    "use strict";

    $(window).on('keyup', function (event) {
        if (event.keyCode === 27) {
            $('.ezmodal').each(function () {
                if ($(this).ezmodal('isVisible')) {
                    if ($(this).data('ezmodal').options.escClose) {
                        $(this).ezmodal('hide');
                    }
                }
            });
        }
    });

    $(document).on('click', '.ezmodal', function () {
        if ($(this).data('ezmodal').options.closable) {
            $(this).ezmodal('hide');
        }
    });

    $(document).on('click', '.ezmodal .ezmodal-container', function (event) {
        event.stopPropagation();
    });

    $(document).on('click', '[data-dismiss="ezmodal"]', function () {
        $(this).parent().parent().parent().ezmodal('hide');
    });

    $(document).on('click', '[ezmodal-target]', function () {
        $($(this).attr('ezmodal-target')).ezmodal('show');
    });

    var EZmodal = function (element, options) {
			this.options = options;
			this.$element = $(element);
		},
		old;

    EZmodal.prototype = {
        show: function () {
            this.$element.show();
            this.options.onShow();
            $('body').css('overflow', 'hidden');
            if (this.$element.find('.ezmodal-container').find('input, textarea, select, button, a').size() === 0) {
                this.$element.find('.ezmodal-footer').find('button, a').first().focus();
            } else {
                this.$element.find('.ezmodal-container').find('input, textarea, select, button, a').first().focus();
            }
        },
        
        hide: function () {
            this.$element.hide();
            this.options.onClose();
            $('body').css('overflow', 'inherit');
        },

        isVisible: function () {
            return this.$element.css('display') === 'block' ? true : false;
        },
        
        constructor: function () {
            var width = this.options.width,
                container = this.$element.find('.ezmodal-container'),
                footer = this.$element.find('.ezmodal-footer'),
                numElem = container.find('input, textarea, select, button, a').size();
                
            if (this.options.autoOpen) {
                this.show();
            }
            
            if (Number(this.options.width)) {
                container.css({
                    'width': width + 'px'
                });
            } else {
                switch (width) {
                case 'small':
					container.css({'width': '40%'});
					break;
				case 'medium':
					container.css({'width': '75%'});
					break;
				case 'full':
					container.css({'width': '95%'});
					break;
                }
            }

            // Control tab navigator
            container.find('input, textarea, select, button, a')
                .each(function (i) {
                    $(this).attr({'tabindex': i + 1});
                });

            footer.find('button, a')
                .each(function () {
                    numElem++;
                    $(this).attr({'tabindex': numElem});
                })
                .last()
                .blur(function () {
                    if (numElem === 0) {
                        this.$element.footer.find('button, a').first().focus();
                    } else {
                        container.find('input, textarea, select, button, a').first().focus();
                    }
                });
        }
    };

    old = $.fn.ezmodal;

    $.fn.ezmodal = function (option, value) {
        var get = '',
            element = this.each(function () {
                var $this = $(this),
                    data = $this.data('ezmodal'),
                    options = $.extend({}, $.fn.ezmodal.defaults, option, typeof option === 'object' && option);

                if (!data) {
                    $this.data('ezmodal', (data = new EZmodal(this, options)));
                    data.constructor();
                }

                if (typeof option === 'string') {
                    get = data[option](value);
                }
            });

        if (typeof get !== 'undefined') {
            return get;
        } else {
            return element;
        }
    };

    $.fn.ezmodal.defaults = {
        'width': 500,
        'closable': true,
        'escClose': true,
        'autoOpen': false,
        'onShow': function () {},
        'onClose': function () {}
    };

    $.fn.ezmodal.noConflict = function () {
        $.fn.ezmodal = old;
        return this;
    };
    
    $(function () {
		$('.ezmodal').each(function () {
			var $this = $(this),
                options = {
					'width' : $this.attr('ezmodal-width'),
                    'escClose' : $this.attr('ezmodal-escclose') === 'false' ? false : true,
					'closable' : $this.attr('ezmodal-closable') === 'false' ? false : true,
					'autoOpen' : $this.attr('ezmodal-autoopen') === 'true' ? true : false
				};
			$this.ezmodal(options);
		});
	});
})(window.jQuery);

/* Preloader JS */
function preloader(immune, background, color) {
  $("body").prepend('<div class="preloader"><span class="loading-bar"></span><i class="radial-loader"></i></div>');

  if (immune == true) {
    $("body > div.preloader").addClass('immune');
  }

  if (background == 'white') {
    $("body > div.preloader").addClass('white');
  }
  
  else if (background == 'black') {
    $("body > div.preloader").addClass('black');
  }

  if (color == 'red') {
    $("body > div.preloader span.loading-bar").addClass('red-colored');
    $("body > div.preloader i.radial-loader").addClass('red-colored');
  } else if (color == 'blue') {
    $("body > div.preloader span.loading-bar").addClass('blue-colored');
    $("body > div.preloader i.radial-loader").addClass('blue-colored');
  } else if (color == 'green') {
    $("body > div.preloader span.loading-bar").addClass('green-colored');
    $("body > div.preloader i.radial-loader").addClass('green-colored');
  } else if (color == 'yellow') {
    $("body > div.preloader span.loading-bar").addClass('yellow-colored');
    $("body > div.preloader i.radial-loader").addClass('yellow-colored');
  }
  $(window).load(function() {
    setTimeout(function() {
      $('.preloader').fadeOut(1000);
    }, 1000);
    setTimeout(function() {
      $('.preloader').remove();
    }, 2000);
    
  })
};

preloader(true, 'black', 'red');

/*
 *
 * jQuery Smooth Scroll
 *
 */
 $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});

jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});

jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$hamburger_icon = $('#cd-hamburger-menu'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer');

	//open lateral menu on mobile
	$hamburger_icon.on('click', function(event){
		event.preventDefault();
		//close cart panel (if it's open)
		$lateral_cart.removeClass('speed-in');
		toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
	});

	//open cart
	$cart_trigger.on('click', function(event){
		event.preventDefault();
		//close lateral menu (if it's open)
		$menu_navigation.removeClass('speed-in');
		toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
	});

	//close lateral cart or lateral menu
	$shadow_layer.on('click', function(){
		$shadow_layer.removeClass('is-visible');
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $lateral_cart.hasClass('speed-in') ) {
			$lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$menu_navigation.removeClass('speed-in');
		} else {
			$menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$lateral_cart.removeClass('speed-in');
		}
	});

	//move #main-navigation inside header on laptop
	//insert #main-navigation after header on mobile
	move_navigation( $menu_navigation, $L);
	$(window).on('resize', function(){
		move_navigation( $menu_navigation, $L);
		
		if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
			$menu_navigation.removeClass('speed-in');
			$shadow_layer.removeClass('is-visible');
			$('body').removeClass('overflow-hidden');
		}

	});
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		$lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.removeClass('overflow-hidden');
		});
		$background_layer.removeClass('is-visible');

	} else {
		$lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.addClass('overflow-hidden');
		});
		$background_layer.addClass('is-visible');
	}
}

function move_navigation( $navigation, $MQ) {
	if ( $(window).width() >= $MQ ) {
		$navigation.detach();
		$navigation.appendTo('header');
	} else {
		$navigation.detach();
		$navigation.insertAfter('header');
	}
}