( function($) {
  'use strict';
$(function(e) {
	
/*------------------------------------------------------------------
	Responsive sub-menu btn
	-------------------------------------------------------------------*/
//
$('.sub-menu').removeClass('sub-menu').addClass('dropdown-menu');
$('.menu-item-has-children').click(function(){
	$(this).closest('li').children('.dropdown-menu').slideToggle();
});

/*------------------------------------------------------------------
	Banner-Slideshow
	-------------------------------------------------------------------*/
if (screen.width < 768) {
	$('#banner2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}
else {
	$('#banner2 .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	autoWidth:true,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}


/*------------------------------------------------------------------
	Home Banner Slider
	-------------------------------------------------------------------*/
$(window).on('load', function (){
if (screen.width < 768) {
	$('#homebannerslider .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	items: 1,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}
else {
	$('#homebannerslider .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	autoplay:true,
    autoplayTimeout:5000,
	
	items: 1,
	dots: false,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	})
}
});

/*------------------------------------------------------------------
	Testimonial Slider
	-------------------------------------------------------------------*/
$('#testimonial-slider .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
})	
	
/*------------------------------------------------------------------
	Testimonial Slider 2
	-------------------------------------------------------------------*/	
$('#testimonial-slider-2 .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	
	
	
$('#testimonial-slider-3 .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
})


$('#testimonial-slider-4 .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        1000:{
            items:2
        }
    }
})

/*-----------------------------------------------------------------
Home 3 slider
-------------------------------------------------------------------------*/
    jQuery("#animation-slide").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        nav: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        animateIn: "zoomIn",
        animateOut: "fadeOutDown",
        autoplayHoverPause: false,
        touchDrag: true,
        mouseDrag: true
    });
    jQuery("#animation-slide").on("translate.owl.carousel", function () {
        jQuery(this).find(".owl-item .slide-text > *").removeClass("fadeInUp animated").css("opacity","1");
        jQuery(this).find(".owl-item .slide-img").removeClass("fadeInRight animated").css("opacity","1");
    });          
    jQuery("#animation-slide").on("translated.owl.carousel", function () {
        jQuery(this).find(".owl-item.active .slide-text > *").addClass("fadeInUp animated").css("opacity","1");
        jQuery(this).find(".owl-item.active .slide-img").addClass("fadeInRight animated").css("opacity","1");
    });
	
/*------------------------------------------------------------------
	Trending Slider
	-------------------------------------------------------------------*/
$('#trending_slider .owl-carousel').owlCarousel({
    loop:true,
    nav:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	

/*------------------------------------------------------------------
	Popular Brands
	-------------------------------------------------------------------*/
$('#popular_brands .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
	rtl:true,
	autoplay  : 3000,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})	


/*------------------------------------------------------------------
	Listing Image Slider { Style 1}
	-------------------------------------------------------------------*/	
$('#listing_img_slider .owl-carousel').owlCarousel({
    loop:true,
    nav:true,
	dots:false,
	rtl:true,
	autoplay:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	



/*------------------------------------------------------------------
	Listing Image Slider { Style 2}
	-------------------------------------------------------------------*/
	$('.listing_images_slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  //rtl:true,
	  asNavFor: '.listing_images_slider_nav'
	});
	$('.listing_images_slider_nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.listing_images_slider',
	  dots: false,
	  //rtl:true,
	  centerMode: true,
	  focusOnSelect: true
	});

/*------------------------------------------------------------------
	Search-button
	-------------------------------------------------------------------*/
	$("#search_toggle").click(function(){
		$("#header-search-form").slideToggle();
	});
	


/*------------------------------------------------------------------
	Filter-Form
	-------------------------------------------------------------------*/
	$("#filter_toggle").click(function(){
		$("#filter_form").slideToggle();
	});
	
	
	
/*------------------------------------------------------------------
	Other-info
	-------------------------------------------------------------------*/
	$("#other_info").click(function(){
		$("#info_toggle").slideToggle();
	});

/*------------------------------------------------------------------
	-------------------------------------------------------------------*/
$(window).load(function(){
var price_payment = jQuery('.pcd-pricing .pcd-price').text();
jQuery('.payment-form .payment-price').attr('value',jQuery.trim(price_payment));
var start_rate = jQuery('.down-pay-percent option:selected').attr('data-input');
jQuery('.pay_rate').val(start_rate);
jQuery('.down-pay-percent').on('change', function(){
	var rate = jQuery(this).find('option:selected').attr('data-input');
	jQuery('.pay_rate').val(rate);
})
jQuery('.payment_cal_btn').on('click', function(){
	var price_item = jQuery('.payment-price').val();
	var down_percent = jQuery('.down-pay-percent').val();
	var annual_percent = jQuery('.pay_rate').val();
	var period_time = jQuery('.down-pay-years').val();

	var price_number = price_item.replace(/[^0-9]/g, '');
	var down_pay_number = price_number*down_percent/100;

	var loan_pay = price_number - down_pay_number;
	var real_pay = loan_pay/period_time;
	var annual_pay_total = Math.round(((loan_pay*annual_percent)/100) * 100) / 100;
	var annual_pay = annual_pay_total/period_time;
	var total_pay = Math.round((parseInt(price_number) + annual_pay_total) * 100) / 100;

	var monthy_payment = Math.round((real_pay + annual_pay) * 100) / 100;

	jQuery('.monthy').html(monthy_payment);
	jQuery('.free-amount').html(annual_pay_total);
	jQuery('.total-pay').html(total_pay);
	jQuery('.payment_result').addClass('active');
})
});
/*-------------------------------------------------------------------------------
	Short Order
-------------------------------------------------------------------------------*/
 $('#auto_price_list').change(function()
 {
     $('#ShortOrder').submit();
 }); 	
	
/*-------------------------------------------------------------------------------
	Add Placeholder
-------------------------------------------------------------------------------*/
	$("#comment").attr("placeholder", "Comment");	
/*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();
	 
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
});

/*------------------------------------------------------------------
     Reset Form
	--------------------------------------------------------------------*/

jquery(document).ready(function(){
jquery("#from_reset").click(function(){
/* Single line Reset function executes on click of Reset Button */
jquery("#search_form")[0].reset();

});
});	


jquery(document).ready(function(){
jquery("#ad_reset").click(function(){
/* Single line Reset function executes on click of Reset Button */
jquery("#advanced_form")[0].reset();

});
});	

jquery(document).ready(function(){
jquery("#side_reset").click(function(){
/* Single line Reset function executes on click of Reset Button */
jquery("#side_form")[0].reset();

});
});	

/*------------------------------------------------------------------
	Price-Range
	-------------------------------------------------------------------*/
	$(".price_range").slider({});

var x = screen.width + "px";
document.getElementById("siderwidth1").style.width = x;
document.getElementById("siderwidth2").style.width = x;
document.getElementById("siderwidth3").style.width = x;
document.getElementById("siderwidth4").style.width = x;
document.getElementById("siderwidth5").style.width = x;
document.getElementById("siderwidth6").style.width = x;

})(jQuery);