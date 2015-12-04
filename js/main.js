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
      $('.preloader').fadeOut(2000);
    }, 2000);
    setTimeout(function() {
      $('.preloader').remove();
    }, 3000);
    
  })
};

preloader(true, 'black', 'red');

//peekA-Bar js
;(function($) {

	/** Enable strict mode. */
	'use strict';

	$.peekABar = function(options) {

		var that = this,
			rand = parseInt(Math.random() * 100000000, 0);

		/** Instance */
		this.bar = {};

		/** Settings */
		this.settings = {};

		/** Defaults */
		var defaults = {
			html: 'Your Message Here',
			delay: 3000,
			autohide: false,
			padding: '1em',
			backgroundColor: 'rgb(195, 195, 195)',
			animation: {
				type: 'slide',
				duration: 'slow'
			},
			cssClass: null,
			opacity: '1',
			position: 'top',

			onShow: function() {},
			onHide: function() {},

			closeOnClick: false
		};

		/** Initialise the plugin */
		var init = function() {
			that.settings = $.extend({}, defaults, options);
			_create();
			_applyCustomSettings();
		};

		/** Show the Bar */
		this.show = function(args) {
			if(args !== undefined) {
				if(args.html) {
					this.bar.html(args.html);
				}
			}
			switch (this.settings.animation.type) {
				case 'slide':
					this.bar.slideDown(that.settings.animation.duration);
					break;
				case 'fade':
					this.bar.fadeIn(that.settings.animation.duration);
					break;
			}
			if(this.settings.autohide) {
				setTimeout(function () {
					that.hide();
				}, this.settings.delay);
			}
			this.settings.onShow.call(this, args);
		};

		/** Hide the Bar */
		this.hide = function() {
			switch (this.settings.animation.type) {
				case 'slide':
					this.bar.slideUp(that.settings.animation.duration);
					break;
				case 'fade':
					this.bar.fadeOut(that.settings.animation.duration);
					break;
			}
			this.settings.onHide.call(this);
		};

		/** Create the Bar */
		var _create = function() {
			that.bar = $('<div></div>').addClass('peek-a-bar').attr('id', '__peek_a_bar_' + rand);
			$('html').append(that.bar);
			that.bar.hide();
		};

		/** Apply Custom Bar Settings */
		var _applyCustomSettings = function() {
			_applyHTML();
			_applyAutohide();
			_applyPadding();
			_applyBackgroundColor();
			_applyOpacity();
			_applyCSSClass();
			_applyPosition();
			_applyCloseOnClick();
		};

		/** Set Custom Bar HTML */
		var _applyHTML = function() {
			that.bar.html(that.settings.html);
		};

		/** Autohide the Bar */
		var _applyAutohide = function() {
			if(that.settings.autohide) {
				setTimeout(function () {
					that.hide();
				}, that.settings.delay);
			}
		};

		/** Apply Padding */
		var _applyPadding = function() {
			that.bar.css('padding', that.settings.padding);
		};

		/** Apply Background Color */
		var _applyBackgroundColor = function() {
			that.bar.css('background-color', that.settings.backgroundColor);
		};

		/** Apply Custom CSS Class */
		var _applyCSSClass = function() {
			if(that.settings.cssClass !== null) {
				that.bar.addClass(that.settings.cssClass);
			}
		};

		/** Apply Opacity */
		var _applyOpacity = function() {
			that.bar.css('opacity', that.settings.opacity);
		};

		/** Apply Position where the Bar should be shown */
		var _applyPosition = function() {
			switch(that.settings.position) {
				case 'top':
					that.bar.css('top', 0);
					break;
				case 'bottom':
					that.bar.css('bottom', 0);
					break;
				default:
					that.bar.css('top', 0);
			}
		};

		/** Close the bar on click */
		var _applyCloseOnClick = function() {
			if(that.settings.closeOnClick) {
				that.bar.click(function() {
					that.hide();
				});
			}
		};

		init();

		return this;
	}

});