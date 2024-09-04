(function($) {
	'use strict';

	/*PRELOADER JS
	$(window).on('load', function() { 
		$('.loader').fadeOut();
		$('.preloader').delay(350).fadeOut('slow'); 
	}); 
END PRELOADER JS*/
		
	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});	
	
	/* magnificPopup img view */
	$('.popup-link').magnificPopup({
		type: 'image',
		gallery: {
		  enabled: true
		}
	});	

	$(window).on('scroll',function() {
		
		  if ($(this).scrollTop() > 10) {
			$('#header').addClass('menu-shrink');
		  } else {
			$('#header').removeClass('menu-shrink');
		  }
		});
		
		$('a').on('click', function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top - 50
			}, 1500);
			e.preventDefault();
		});
			
		$(document).on('click','.navbar-collapse.in',function(e) {
		if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
			$(this).collapse('hide');
		}
		});		
			
	new WOW().init();
	// Main slider
	$('.slider_active').owlCarousel({
		loop:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		smartSpeed:450,
		autoplay:true,
		autoplayTimeout:60000,
		mouseDrag:false,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})	
	// blog slider
	$('#blog_slider').owlCarousel({
		autoplay:true,
		items: 3,
		margin: 30,
		loop:true,
		nav:false,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:3
			}
		}
	})
	// testimonial slider
	$('#testimonial-slider').owlCarousel({
	autoplay:true,
	items: 1,
	margin: 30,
	autoplayTimeout:2000,
	mouseDrag:true,
	loop:true,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		1000:{
			items:1
		}
	}
	})
	// client slider 
	$('.client_slide_area').owlCarousel({
	autoplay:true,
	margin: 50,
	loop:true,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:3
		},
		1000:{
			items:5
		}
	}
	})
	// Counter 
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	// jQuery MixItUp
	$('.portfolio_item').mixItUp();
	 // Vide Section
	$("#video").simplePlayer();	
	
    /* --- Google Map --- */
	var mapLocation = new google.maps.LatLng(34.052235,-118.243683);  
	var $mapis = $('#map');
	if ($mapis.length > 0) {
		var map;
		map = new GMaps({
			streetViewControl : true,
			overviewMapControl: true,
			mapTypeControl: true,
			zoomControl : true,
			panControl : true,
			scrollwheel: false,
			center: mapLocation,
			el: '#map',
			zoom: 12,
			styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
		});
		var image = new google.maps.MarkerImage('img/map-icon.png');
		map.addMarker({
			position: mapLocation,
			icon: image,
			title: 'Solid',
			infoWindow: {
				content: '<p><strong>Maks </strong><br/>786 bokton road<br/>P: (123) 456-7890<br/>Los Angeles, CA, USA</p>'
			}
		});

	}
	
	/* Hover 3d init for tilt  */
	if ($('.portfolio_item .mix').length > 0) {
		$('.portfolio_item .mix').tilt({
			maxTilt: 20,
			perspective: 1000,
			easing: "cubic-bezier(.03,.2,.5,.4)",
			scale: 1,
			speed: 500,
			transition: true,
		});
	}		
	
	/* scrollUp */
	$.scrollUp({
		scrollName: 'scrollUp', // Element ID
		topDistance: '300', // Distance from top before showing element (px)
		topSpeed: 300, // Speed back to top (ms)
		animation: 'fade', // Fade, slide, none
		animationInSpeed: 1000, // Animation in speed (ms)
		animationOutSpeed: 1000, // Animation out speed (ms)
		scrollText: 'UP', // Text for element
	});		
	
	
        // Contact Form Start
        // Contact Form Message Popup 
        function contactFormPopup() {
            var trigger = $('#contact-form [type="submit"]'),
                container = $('.cr-contact-message-modal');
        
            trigger.on('click', function () {
                container.addClass('is-visible');
            });
        
            $('<button><i class="fa ti-close"></i></button>').appendTo(container).on('click', function () {
                container.removeClass('is-visible');
            });
        }
        contactFormPopup();
       // Contact Form End
	
	
	
	
	// Active  WOW
	new WOW().init();

})(jQuery);	



