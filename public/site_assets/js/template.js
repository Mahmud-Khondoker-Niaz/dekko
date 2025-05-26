"use strict";

$(document).ready(function(){

	$('input[type="radio"]').click(function(){
		var inputValue = $(this).attr("value");
		var targetBox = $("." + inputValue);
		$(".select_box").not(targetBox).hide();
		$(targetBox).show();
	});
});


function syncPosition(el) {
	var current = this.currentItem;
	var thumbnail_slider  = jQuery("#property-thumb-slider");
	thumbnail_slider
		.find(".owl-item")
		.removeClass("synced")
		.eq(current)
		.addClass("synced");
	if (thumbnail_slider.data("owlCarousel") !== undefined) {
		center(current)
	}
}
function center(number) {
	var thumbnail_slider  = jQuery("#property-thumb-slider");
	var thumbnail_slidervisible = thumbnail_slider.data("owlCarousel").owl.visibleItems;
	var num                     = number;
	var found                   = false;
	for (var i in thumbnail_slidervisible) {
		if (num === thumbnail_slidervisible[i]) {
			var found = true;
		}
	}

	if (found === false) {
		if (num > thumbnail_slidervisible[thumbnail_slidervisible.length - 1]) {
			thumbnail_slider.trigger("owl.goTo", num - thumbnail_slidervisible.length + 2)
		} else {
			if (num - 1 === -1) {
				num = 0;
			}
			thumbnail_slider.trigger("owl.goTo", num);
		}
	} else if (num === thumbnail_slidervisible[thumbnail_slidervisible.length - 1]) {
		thumbnail_slider.trigger("owl.goTo", thumbnail_slidervisible[1])
	} else if (num === thumbnail_slidervisible[0]) {
		thumbnail_slider.trigger("owl.goTo", num - 1)
	}

}

jQuery(document).ready(function () {
$('.owl-carousel-ads-slider').owlCarousel({
    loop:true,
	margin:15,
	items:3,
	lazyLoad : true,
	autoPlay:true,
    responsiveClass:true,
    itemsMobile:[480, 1],
	navigation: !1,
	pagination: !0,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
});

});


jQuery(document).ready(function () {

	// Go Up
	jQuery('#go-up').on('click', function () {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 1000);
	});

	new WOW().init();

	// Enable forms by ajax
	jQuery('#login-form-butt, #register-form-butt').magnificPopup({
		type: 'ajax',
		removalDelay: 600,
		mainClass: 'mfp-fade'
	}),

	$(document).ready(function(){
		$('.menu-tab').click(function(){
		  $('.menu-hide').toggleClass('show');
		  $('.menu-tab').toggleClass('active');
		});
		$('a').click(function(){
		  $('.menu-hide').removeClass('show');
		  $('.menu-tab').removeClass('active');
		});
	  });

    //my menu
	$(document).ready(function(){
		$(window).resize(function(){
			var w = $(window).width();
			if(w > 767) {
				$('.parent').on("click",function(){
					$(this).find("ul.sub-menu li").toggle('slow');
					 $(this).siblings().find("ul.sub-menu li").hide('slow');

				});
			}
		});

	});




	// Enable Featured properties slider
	if (jQuery('#featured-properties .owl-carousel').length > 0) {
		jQuery("#featured-properties .owl-carousel").owlCarousel({
			items:             2,
			itemsDesktop:      [1200, 2],
			itemsDesktopSmall: [980, 1],
			itemsTablet:       [768, 1],
			itemsMobile:       [480, 1],
			navigation:        !1,
			pagination:        !0
		});
	}

	// Enable Top Agent slider
	if (jQuery('#top-agents .owl-carousel').length > 0) {
		jQuery("#top-agents .owl-carousel").owlCarousel({
			items:        4,
			itemsDesktop: [1200, 3],
			itemsDesktopSmall: [980, 2],
			itemsTablet:  [768, 1],
			itemsMobile:  [480, 1],
			navigation:   !1,
			pagination:   !0
		});
	}

	// Enable Clients slider
	if (jQuery('#our-partners .owl-carousel').length > 0) {
		jQuery("#our-partners .owl-carousel").owlCarousel({
			items:        4,
			itemsDesktop: [1200, 4],
			itemsTablet:  [980, 2],
			itemsMobile:  [480, 1],
			navigation:   !0,
			pagination:   !1
		});
	}

	if (jQuery.isFunction(jQuery.fn.select2)) {
		// Change all the select boxes to select2
		jQuery("select").select2();
	}

	// Enable Range Sliders
	if (jQuery('.range-slider').length > 0) {
		jQuery(".range-slider").ionRangeSlider({
			type:       'double',
			prefix:     "$",
			maxPostfix: "+",
			prettify:   false
		});
	}

	if (jQuery('.property-search-form .more-options').length > 0) {
		jQuery('.property-search-form .more-options').on('click', function (e) {
			e.preventDefault();
			if (jQuery(this).siblings('.advanced-search-sec').length > 0) {
				jQuery(this).siblings('.advanced-search-sec').slideToggle(function () {
					jQuery(window).trigger('resize.px.parallax');
				});
				jQuery(this).parents('.property-search-form').toggleClass('opened');
			} else {
				jQuery(this).parents('.main-search-sec').siblings('.advanced-search-sec').slideToggle(function () {
					jQuery(window).trigger('resize.px.parallax');
				});
				jQuery(this).parents('.property-search-form').toggleClass('opened');
			}

		});
	}

	if (jQuery("#main-slider").length > 0) {
		// Main Slider
		var mainSlider = jQuery("#main-slider");

		mainSlider.find('.items').each(function(){
			var imgContainer = jQuery(this).find('.img-container');
			imgContainer.css('background-image', 'url(' + imgContainer.data('bg-img') + ')');
		});

		mainSlider.owlCarousel({
			navigation:     !1,
			singleItem:     !0,
			addClassActive: !0,
			autoPlay:       !0,
			pagination:     !1,
		});
		mainSlider.on('click', function(){
			// Perform your desired action here
			console.log("Slider clicked");
			// You can replace the console.log statement with your own code
		});
	}

	if (jQuery("#main-slider-fullscreen").length > 0) {
		// Main Slider
		var mainSlider = jQuery("#main-slider-fullscreen");

		// mainSlider.find('.items').each(function(){
		// 	var imgContainer = jQuery(this).find('.img-container');
		// 	imgContainer.css('background-image', 'url(' + imgContainer.data('bg-img') + ')');
		// });
		// mainSlider.owlCarousel({
		// 	navigation:     !1,
		// 	singleItem:     !0,
		// 	addClassActive: !0,
		// 	autoPlay:       !0,
		// 	pagination:     !0,
		// });
	}

	if (jQuery("#property-compare-slider").length > 0) {
		// Compare Slider
		var compareSlider = jQuery("#property-compare-slider");
		compareSlider.owlCarousel({
			items:        3,
			itemsDesktop: [1200, 2],
			itemsTablet:  [980, 1],
			itemsMobile:  [480, 1],
			navigation:   !0,
			pagination:   !1
		});
	}


	if (jQuery("#property-slider-section").length > 0) {

		var main_image_slider = jQuery("#property-main-slider"),
			thumbnail_slider  = jQuery("#property-thumb-slider");

		main_image_slider.find('.items').each(function(){
			var imgContainer = jQuery(this).find('.img-container');
			imgContainer.css('background-image', 'url(' + imgContainer.data('bg-img') + ')');
		});

		thumbnail_slider.find('.items').each(function(){
			var imgContainer = jQuery(this).find('.img-container');
			imgContainer.css('background-image', 'url(' + imgContainer.data('bg-img') + ')');
		});

		main_image_slider.owlCarousel({
			addClassActive:        !0,
			singleItem:            true,
			slideSpeed:            1000,
			navigation:            false,
			pagination:            false,
			autoPlay:              true,
			afterAction:           syncPosition,
			responsiveRefreshRate: 200,
		});

		thumbnail_slider.owlCarousel({
			items:                 3,
			itemsDesktop:          [1199, 3],
			itemsDesktopSmall:     [979, 3],
			itemsTablet:           [768, 2],
			itemsMobile:           [479, 1],
			pagination:            false,
			responsiveRefreshRate: 100,
			afterInit:             function (el) {
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});

		thumbnail_slider.on("click", ".owl-item", function (e) {
			e.preventDefault();
			var number = jQuery(this).data("owlItem");
			main_image_slider.trigger("owl.goTo", number);
		});

	}


	// Enable Google Map
	if (jQuery('#map').length > 0) {
		initialize();
	}

	// Enable Location auto complete
	if (jQuery('#location-search-box').length > 0 && jQuery('#map').length == 0) {
		var input        = document.getElementById('location-search-box');
		var autocomplete = new google.maps.places.Autocomplete(input);
	}

	//Fullscreen button activation
	if (jQuery('#fullscreen-btn').length > 0) {
		jQuery('#fullscreen-btn').on('click', function (e) {
			e.preventDefault();
			jQuery(this).toggleClass('active');
			jQuery('body').toggleClass('full-screen');
		});
	}

	if (jQuery.isFunction(jQuery.fn.isotope)) {
		var mainContainer = jQuery(".image-main-box");
		mainContainer.isotope({
			transitionDuration: "0.7s"
		});
		mainContainer.imagesLoaded(function () {
			mainContainer.isotope("layout");
			jQuery(".sort-section-container").on("click", "a", function (e) {
				e.preventDefault();
				jQuery(".sort-section-container a").removeClass("active");
				jQuery(this).addClass("active");
				var filterValue = jQuery(this).attr("data-filter");
				mainContainer.isotope({filter: filterValue});
				jQuery(window).trigger('resize.px.parallax');
			});
		});
	}

	if (jQuery.isFunction(jQuery.fn.magnificPopup)) {
		jQuery('.image-main-box:not(.portfolio)').magnificPopup({
			delegate:     '.more-details',
			type:         'image',
			removalDelay: 600,
			mainClass:    'mfp-fade',
			gallery:      {
				enabled:            true,
				navigateByImgClick: true,
				preload:            [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			image:        {
				titleSrc: 'data-title',
				tError:   '<a href="%url%">The image #%curr%</a> could not be loaded.'
			}
		});
	}

	// FAQ section
	if (jQuery('.faq-box').length > 0) {
		jQuery('.faq-box').on('click', '.title', function () {
			jQuery(this).next('.content').slideToggle(function () {
				jQuery(window).trigger('resize.px.parallax');
			}).parent().toggleClass('opened');
		});
	}

	// Make Number Thousand separated
	jQuery('.number-field').on('keyup', function (event) {
		// skip for arrow keys
		if (event.which >= 37 && event.which <= 40) return;
		// format number
		jQuery(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		});
	});

	//Enable neighborhood buttons
	function enableByButtons() {
		jQuery('.neighborhood-row .btn-container').on('click', 'button', function () {
			jQuery(this).parent().siblings('.neighbor-by').val(jQuery(this).data('value'));
			jQuery(this).addClass('active').siblings('button').removeClass('active');
		});
	}
	if (jQuery('.neighborhood-row').length > 0) {

		enableByButtons();
		// Add new neighborhood
		jQuery('.add-neighborhood-btn').on('click', function () {
			var neighboorPattern = jQuery('#neighborhood-pattern').clone().attr('id', '');
			jQuery('.neighborhood-container').append(neighboorPattern);
			jQuery(window).trigger('resize.px.parallax');
			enableByButtons();
		});
	}

	if (jQuery('body.compare').length > 0) {
		var boxesHeight = 0;
		jQuery(".neighborhood").each(function () {
			var currBoxHeight = jQuery(this).height();
			if (currBoxHeight > boxesHeight) {
				boxesHeight = currBoxHeight
			}
		});
		jQuery(".neighborhood").height(boxesHeight);
	}
});



// sticky menu

jQuery(window).scroll(function () {
	"use strict";
	var haderSec = jQuery("body, #main-header");
	jQuery(document).scrollTop() > 30 ? haderSec.addClass("sticky") : haderSec.removeClass("sticky");
});

jQuery(window).scroll(function () {
	"use strict";
	var haderSec = jQuery("body, .short-note");
	jQuery(document).scrollTop() > 950 ? haderSec.addClass("short_sticky") : haderSec.removeClass("short_sticky");
});

//search dropdown

$(document).ready(function(){
	//shwo dropdown
	$('#size-dropdwon').on("click", function(event){
	  $(this).next('#size-dropdwon-sub').toggle();
	  event.stopPropagation();
	  event.preventDefault();
	});

    $("#size-dropdwon-sub").on("click", function (event) {
        event.stopPropagation();
	});

	$(document).on("click", function () {
		$("#size-dropdwon-sub").hide();
	});
 $('.data_max').on("click", function () {
		$("#size-dropdwon-sub").hide();
	});


	$('.size-close').on("click", function () {
		$("#size-dropdwon-sub").hide();
	});

    /// Size Onkeyup
	$("#get_min_data_value").keyup(function(){
		var data=parseInt($("#get_min_data_value").val());
		var max_size = parseInt($("#get_max_data_value").val());
		if(max_size < data){
            $(".show_limit_size").html("<i style='color:red'>Maximum size should be greater than minimum size.</i>");
		}
		else{
	   	   $(".show_limit_size").html("");
	    }

		$("#get_min_data_value").val(data);
	    $("#get_min_text_data").text(data);
	});
	$("#get_max_data_value").keyup(function(){

		var data = parseInt($("#get_max_data_value").val());
		var min_size = parseInt($("#get_min_data_value").val());
	    if(min_size > data){
	   	   $(".show_limit_size").html("<i style='color:red'>Maximum size should be greater than minimum size.</i>");
	    }
	    else{
	   	   $(".show_limit_size").html("");
	    }
		$("#get_max_data_value").val(data);
	    $("#get_max_text_data").text(data);
	});
	/// Size Onkeyup

	/// Price Onkeyup
    $("#get_min_price_value").keyup(function(){
        var data = parseInt($("#get_min_price_value").val());
		var max_price = parseInt($("#get_max_price_value").val());
		if(max_price<data){
            $(".show_limit_price").html("<i style='color:red'>Minimum price should be greater than maximum price</i>");
		}
		else{
	   	   $(".show_limit_price").html("");
	    }
		$("#get_min_price_value").val(data);
	    $("#get_min_text_price").text(data);
    });

    $("#get_max_price_value").keyup(function(){
        var data = parseInt($("#get_max_price_value").val());
		var min_price = parseInt($("#get_min_price_value").val());
		if(min_price > data){
	   	   $(".show_limit_price").html("<i style='color:red'>Minimum price greater than maximum price</i>");
	    }
	    else{
	   	   $(".show_limit_price").html("");
	    }
	    $("#get_max_price_value").val(data);
	    $("#get_max_text_price").text(data);
    });
	/// Price Onkeyup



	// pass value: size (sft)
	$(".data_min").click(function(){
		var datas=$(this).data("id");
		var max_size = $("#get_max_data_value").val();
		var data1 =   datas.replace(/,/g, '');
        var max_size1 =   max_size.replace(/,/g, '');
        var data1 = parseInt(data1);
        var max_size1 = parseInt(max_size1);

        if(datas=='0,0'){
			datas = 0;
		}
		if(max_size1 < data1){
            $(".show_limit_size").html("<i style='color:red'>Maximum size should be greater than minimum size</i>");
		}
		else{
	   	   $(".show_limit_size").html("");
	    }

		$("#get_min_data_value").val(data1);
	    $("#get_min_text_data").text(datas);
	});

	$(".data_max").click(function(){
	    var datas=$(this).data("id");
	    var min_size = $("#get_min_data_value").val();
	    var data1 =   datas.replace(/,/g, '');
        var min_size1 =   min_size.replace(/,/g, '');
        var data1 = parseInt(data1);
        var min_size1 = parseInt(min_size1);

        if(datas=='0,0'){
			datas = 0;
		}
	    if(min_size1 > data1){
	   	   $(".show_limit_size").html("<i style='color:red'>Maximum size should be greater than minimum size</i>");
	    }
	    else{
	   	   $(".show_limit_size").html("");
	    }
	    if(isNaN(data1)) {
	    	var data1 = 'any';
	    }
	    $("#get_max_data_value").val(data1);
	    $("#get_max_text_data").text(datas);
	});
    // Price selected size hide
	$(".price_dropdown").click(function(){
	  	$(".size_dropdown").hide();
	});

});

  //price dropdown search
$(document).ready(function(){

	$('#price-dropdwon').on("click", function(event){
	  $(this).next('#price-dropdwon-sub').toggle();
	  event.stopPropagation();
	  event.preventDefault();
	});

    $("#price-dropdwon-sub").on("click", function (event) {
        event.stopPropagation();
	});
 $('.data_max_price').on("click", function () {
		$("#price-dropdwon-sub").hide();
	});

	$('.price-close').on("click", function () {
		$("#price-dropdwon-sub").hide();
	});

	$(document).click( function() {

        $('#price-dropdwon-sub').hide();

    });




    // parseInt
    // var max_data1 = max_data.replace(/,/g, '');
   //var min_price1 = min_price.replace(/,/g, '');

	// pass value: price
	$(".data_min_price").click(function(){
		var datas=$(this).data("id");
		var max_prices = $("#get_max_price_value").val();

        var data1 =   datas.replace(/,/g, '');
        var max_price1 =   max_prices.replace(/,/g, '');

        var data1 = parseInt(data1);
        var max_price1 = parseInt(max_price1);
        if(datas=='0,0'){
			datas = 0;
		}

		if(max_price1 < data1){
            $(".show_limit_price").html("<i style='color:red'>Please minimum price greater than maximum price</i>");
		}
		else{
	   	   $(".show_limit_price").html("");
	    }
		$("#get_min_price_value").val(data1);
	    $("#get_min_text_price").text(datas);
	});

	$(".data_max_price").click(function(){

		var datas=$(this).data("id");
		var min_prices = $("#get_min_price_value").val();

		var data1 =   datas.replace(/,/g, '');
        var min_price1 =   min_prices.replace(/,/g, '');
        var data1 = parseInt(data1);
        var min_price1 = parseInt(min_price1);

        if(datas=='0,0'){
			datas = 0;
		}

		if(min_price1 > data1){
	   	   $(".show_limit_price").html("<i style='color:red'>Please minimum price greater than maximum price</i>");
	    }
	    else{
	   	   $(".show_limit_price").html("");
	    }
	    if(isNaN(data1)) {
	    	var data1 = 'any';
	    }
	    $("#get_max_price_value").val(data1);
	    $("#get_max_text_price").text(datas);
	});

  });


//$("input[type=text]").keyup(function () {


   //$("input[type=text]").each(function () {
      // if(isNaN(data1 * parseFloat($(this).attr("inc"))))
      //     $(this).val(0);
     //  else
     //      $(this).val(data1 * parseFloat($(this).attr("inc")));
   // });
//});

  //size add remove class

  $(document).ready(function() {
	$(".sizemin span").click(function () {
		$(".sizemin span").removeClass("active");
		// $(".tab").addClass("active"); // instead of this do the below
		$(this).addClass("active");
	});
});

$(document).ready(function() {
	$(".sizemax span").click(function () {
		$(".sizemax span").removeClass("active");
		$(this).addClass("active");
	});
});


  //price add remove class

  $(document).ready(function() {
	$(".pricemin span").click(function () {
		$(".pricemin span").removeClass("active");
		// $(".tab").addClass("active"); // instead of this do the below
		$(this).addClass("active");
	});
});

$(document).ready(function() {
	$(".pricemax span").click(function () {
		$(".pricemax span").removeClass("active");
		$(this).addClass("active");
	});
});

// all ads slider
jQuery( document ).ready(function() {

    //home page ads

    jQuery('#on_sale_ads_slide').cycle({
      fx:    'turnDown',
        //sync:   0,
        delay: -2000
    });

    //sidebar widget ads

    jQuery('#sidebar_square_ads').cycle({
      fx:    'scrollLeft',
        sync:   0,
        delay: -2000
    });

});

$(function(){
    $('ul.short-note-list li').click(function(){
        $('ul.short-note-list li.active').removeClass('active');
        $(this).addClass('active');
    });
});
