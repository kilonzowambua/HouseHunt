AOS.init({
	duration: 800,
	easing: 'slide',
	once: true
});

$(function(){

	'use strict';

	$(".loader").delay(200).fadeOut("slow");
  $("#overlayer").delay(200).fadeOut("slow");	

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {
			
			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        
        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$('body').find('.js-menu-toggle').removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$('body').find('.js-menu-toggle').addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
					$('body').find('.js-menu-toggle').removeClass('active');
				}
	    }
		});
	}; 
	siteMenuClone();

	var owlPlugin = function() {
		if ( $('.owl-single').length > 0 ) {
			var owl = $('.owl-single').owlCarousel({
		    loop: true,
		    autoHeight: true,
		    margin: 0,
		    autoplay: false,
		    smartSpeed: 700,
		    items: 1,
		    nav: true,
		    navText: ['<span class="icon-keyboard_backspace"></span>','<span class="icon-keyboard_backspace"></span>']
			});

			owl.on('initialized.owl.carousel', function() {
				owl.trigger('refresh.owl.carousel');
			});

			$('.custom-owl-next').click(function(e) {
				e.preventDefault();
				owl.trigger('next.owl.carousel');
			})
			$('.custom-owl-prev').click(function(e) {
				e.preventDefault();
				owl.trigger('prev.owl.carousel');
			})
		}


	}
	owlPlugin();

	var counter = function() {
		
		$('.count-numbers').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ut-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.counter > span').each(function(){
					var $this = $(this),
						num = $this.data('number');
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	$('.js-search-toggle').on('click', function() {
		$('.search-wrap').toggleClass('active');

		setTimeout(function() {
			$('#s').focus();
		}, 400);
	})

	$(document).mouseup(function(e) {
    var container = $(".search-wrap form");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      if ( $('.search-wrap').hasClass('active') ) {
				$('.search-wrap').removeClass('active');
			}
    }
	}); 


	var pricing = function() {
		$('.js-period-toggle').on('click', function(e) {
			var $this = $(this),
				pricingItem = $('.pricing-item');
			if ( $('.period-toggle').hasClass('active') ) {
				$this.removeClass('active');
				pricingItem.removeClass('yearly');
			} else {
				$this.addClass('active');
				pricingItem.addClass('yearly');
			}
			e.preventDefault();
		})
	}
	pricing();

})

