( function($) {


  'use strict';


/*------------------------------------------------------------------


	Category-Slider


	-------------------------------------------------------------------*/


	$('#category_slider .owl-carousel').owlCarousel({


    loop:true,


    margin:15,


    nav:true,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        500:{items:2},


        767:{items:3},


        1000:{items:6}


    }


	})


	


/*------------------------------------------------------------------


	Category-Slider-2


	-------------------------------------------------------------------*/


	$('#category_slider2 .owl-carousel').owlCarousel({


    loop:true,


    margin:30,


    nav:true,


	dots:false,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        1000:{items:4}


    }


	})


	


	


/*------------------------------------------------------------------


	Popular-Listings


	-------------------------------------------------------------------*/


	$('#popular_listing_slider .owl-carousel').owlCarousel({


    loop:true,


    margin:0,


    nav:true,


	dots:false,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        1000:{items:3}


    }


	})








/*------------------------------------------------------------------


	Testimonial-Slider


	-------------------------------------------------------------------*/


	$('#testimonial_slider .owl-carousel').owlCarousel({


    loop:true,


    margin:0,


    nav:true,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        1000:{items:1}


    }


	})


	


/*------------------------------------------------------------------


	Testimonial-Slider


	-------------------------------------------------------------------*/


	$('#testimonial_slider2 .owl-carousel').owlCarousel({


    loop:true,


    margin:0,


	dots:false,


    nav:true,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        1000:{items:1}


    }


	})





/*------------------------------------------------------------------


	Listing-Image-Slider


	-------------------------------------------------------------------*/


	$('#listing_img_slider .owl-carousel').owlCarousel({


    loop:true,


    margin:0,


    nav:true,


	dots:false,


	autoplay:true,


    autoplayTimeout:5000,


    responsive:{


        0:{items:1},


        1000:{items:4}


    }


	})


	


	


/*-------------------------------------------------------------------------------


	  Smooth scroll to anchor


	-------------------------------------------------------------------------------*/


	var navbar=$('.js-navbar');


	var navbarAffixHeight=80


	$('.js-target-scroll').on('click', function(e) {


		var target = $(this.hash);


		if (target.length) {


			$('html,body').animate({


				scrollTop: (target.offset().top - navbarAffixHeight + 1)


			}, 1000);


			return false;


		}


	});


	


/*-------------------------------------------------------------------------------


		Dashboard-Navigation


	-------------------------------------------------------------------------------*/


	$('#dashboard-responsive-nav-trigger').on('click', function(e) {


		   $("#dashboard-nav").toggle("show");


	});





/*-------------------------------------------------------------------------------


		Add-Navigation-Arrow


	-------------------------------------------------------------------------------*/

$(function() {


    $('#navigation li.menu-item-has-children .arrow').on('click', function(e) {


        e.stopPropagation();


		var $el = $(this).siblings('ul.sub-menu').slideToggle();


    });


        $('#navigation li.menu-item-has-children .arrow').on('click', function(e) {


        e.stopImmediatePropagation();  


    });


});	

	
	$("#menu_slide").click(function(){
		$('body').toggleClass('over_hidden')
	});


})(jQuery);