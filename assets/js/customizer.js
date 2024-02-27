/**
 * File customizer.js.
 *
 */

(function ($) {
	
  wp.customize("cawqv_sale_flash_bg", function (value) {
    value.bind(function (to) {
      $(".qv-col .onsale").css("background", to);
    });
  });
   wp.customize("cawqv_cart_button_bg", function (value) {
    value.bind(function (to) {
      $(".woocommerce .qv-description button.button.alt").css("background", to);
    });
  });
   wp.customize("cawqv_view_cart_button_bg", function (value) {
    value.bind(function (to) {
      $(".added_to_cart.wc-forward").css("background", to);
    });
  });
 
  wp.customize("cawqv_window_bg", function (value) {
    value.bind(function (to) {
      $(".qv-row").css("background", to);
    });
  }); 
  wp.customize("cawqv_desc_color", function (value) {
    value.bind(function (to) {
      $(".qv-description .woocommerce-product-details__short-description, .stock.out-of-stock").css("color", to);
    });
  });
  
  wp.customize("cawqv_title_color", function (value) {
    value.bind(function (to) {
      $(".qv-description .product_title").css("color", to);
    });
  }); 
  wp.customize("cawqv_product_meta_color", function (value) {
    value.bind(function (to) {
      $(".qv-description .product_meta").css("color", to);
    });
  });
   wp.customize("cawqv_product_meta_link_color", function (value) {
    value.bind(function (to) {
      $(".qv-description .product_meta a").css("color", to);
    });
  }); 
  wp.customize("cawqv_product_review_color", function (value) {
    value.bind(function (to) {
      $(".qv-description .woocommerce-product-rating .star-rating, .qv-description .woocommerce-product-rating a").css("color", to);
    });
  }); 
  wp.customize("cawqv_product_price_color", function (value) {
    value.bind(function (to) {
      $(".qv-description p.price").css("color", to);
    });
  });
  
  wp.customize("qv_button_label", function (value) {
    value.bind(function (to) {
      $(".caqv-open-modal span").text(to);
    });
  });
  wp.customize("cawqv_action_button_bg", function (value) {
    value.bind(function (to) {
      $(".caqv-open-modal").css("background", to);
    });
  });
  
   //===Animation Section ====
  wp.customize("qv_animation", function (value) {
    value.bind(function (to) {
      $(".bg-wg-modal .wg-modal").css("animation-name", to);
      $(".bg-wg-modal .wg-modal").addClass("animate__animated");
    });
  });
  //===Close Icon Section ====
  wp.customize("cawqv_icon_picker", function (value) {
    value.bind(function (to) {
		var $target =  $(".remodal-modal-close");
		var $icon = to;
		var $close_container =  ($icon=='default') 
		? $('<div class="remodal-modal-close">&times;</div>')
		: $('<div class="remodal-modal-close"><i class="'+$icon+'"></i></div>');
		
		$target.remove();
		$('.wg-content').append($close_container);
    });
  });
  wp.customize("btn_padding_top_bottom", function (value) {
    value.bind(function (to) {
	  $("button.button.alt").css({"padding-top": to +"px", "padding-bottom": to + "px" });
	   $(".added_to_cart.wc-forward").css({"padding": to +"px"});
    });
  });
   wp.customize("btn_padding_left_right", function (value) {
    value.bind(function (to) {
       $("button.button.alt").css({"padding-left": to +"px", "padding-right": to + "px" });
    });
  }); 
  wp.customize("cawqv_icon_color", function (value) {
    value.bind(function (to) {
      $(".remodal-modal-close i").css("color", to);
    });
  });
  //===Slider Nav Section ====
  wp.customize("cawqv_slider_prev_icon", function (value) {
    value.bind(function (to) {
      $(".owl-prev i").removeClass().addClass(to);
    });
  });
   wp.customize("cawqv_slider_next_icon", function (value) {
    value.bind(function (to) {
      $(".owl-next i").removeClass().addClass(to);
    });
  });
  wp.customize("cawqv_nav_color", function (value) {
    value.bind(function (to) {
      $(".cawqv-open .swiper-button-next, .cawqv-open .swiper-button-prev").css("color", to);
    });
  });
  wp.customize("cawqv_nav_hover_color", function (value) {
    value.bind(function (to) {
      $(".cawqv-open .swiper-button-next:hover, .cawqv-open .swiper-button-prev:hover").css("color", to);
    });
  });
    //=== Slider Dot Section ====
   wp.customize("cawqv_slider_dot_switch", function (value) {
    value.bind(function (to) {
		if(to===false){
			$(".cawqv-theme .owl-dots").hide();
		}else{
			$(".cawqv-theme .owl-dots").show();
		}
    });
  });
    wp.customize("cawqv_slider_nav_switch", function (value) {
    value.bind(function (to) {
		if(to===false){
			$(".swiper-button-next, .swiper-button-prev").hide();
		}else{
			$(".swiper-button-next, .swiper-button-prev").show();
		}
    });
  });

  
  //Button Icon
   wp.customize("cawqv_general_section", function (value) {
    value.bind(function (to) {
		var $icon = to;
		$('.btn-icon').removeClass().addClass($icon);
    });
  });

  //Modal Radius
   wp.customize("modal_radius", function (value) {
    value.bind(function (to) {
		var $icon = to;
		$('.cawqv-open .bg-wg-modal .wg-modal').css({"border-radius": to +"px" });
    });
  });

   //Modal width
   wp.customize("modal_width", function (value) {
    value.bind(function (to) {
		var $icon = to;
		$('.cawqv-open .bg-wg-modal .wg-modal').css({"width": to +"%" });
    });
  });

})(jQuery);