<?php
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cawqv_customize_preview_js() {
	wp_enqueue_script( 'cawqv-customizer', CAWQV_PATH . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cawqv_customize_preview_js' );



function cawqv_custom_css_output() {
	$padding_top 	=  get_option( 'btn_padding_top_bottom', '' );
	$padding_left   = get_option( 'btn_padding_left_right', '' );
	
	?>
  <style type="text/css" id="cawqv-plugin-css">
		.cawqv-open .swiper-button-next, .cawqv-open .swiper-button-prev{
			color: <?php echo esc_attr(get_option( 'cawqv_nav_color', '' )) ;?>;
		}
		.cawqv-open .swiper-button-prev:hover, .cawqv-open .swiper-button-next:hover{
			color: <?php echo esc_attr(get_option( 'cawqv_nav_hover_color', '' )) ;?>;
		}
		.cawqv-theme .owl-dots .owl-dot.active span, 
		.owl-theme .owl-dots .owl-dot:hover span{
			background: <?php echo esc_attr(get_option( 'cawqv_dot_color', '' ))  ;?>;
		}
		<?php if($padding_top!="" || $padding_left!="" ): ?>
		.woocommerce .qv-description button.button.alt{
			padding: <?php echo esc_attr($padding_top .'px' . " ". $padding_left .'px');?>
		}
		<?php endif;?>
		.woocommerce .qv-description .added_to_cart.wc-forward{
			padding: <?php echo esc_attr($padding_top .'px');?>
		}
	  .minimodal-modal-close i{
		  color: <?php echo esc_attr(get_option( 'cawqv_icon_color', '' ));?>
	  }
	  .woocommerce .qv-col span.onsale{
		  background: <?php echo esc_attr(get_option( 'cawqv_sale_flash_bg', '' )); ?>;
	  }
	  .woocommerce .qv-description button.button.alt, 
	  .woocommerce-cart .qv-description button.button.alt{
		  background: <?php echo esc_attr(get_option( 'cawqv_cart_button_bg', '#333' ));?>
	  }
	  .woocommerce .qv-description a.added_to_cart.wc-forward{
		  background: <?php echo esc_attr(get_option( 'cawqv_view_cart_button_bg', '' ));?>
	  }
	  .qv-row{
		  background: <?php echo esc_attr(get_option( 'cawqv_window_bg', '' ));?>
	  }
	  .qv-description .product_title{
		  color: <?php echo esc_attr(get_option( 'cawqv_title_color', '' ));?>
	  }
	  .bg-wg-modal .wg-modal {
			animation-name: <?php echo esc_attr(get_option( 'qv_animation', '' ));?>;
			animation-duration: 0.4s;
		}
		.qv-description .woocommerce-product-details__short-description, .qv-description .stock.out-of-stock {
			color: <?php echo esc_attr(get_option( 'cawqv_desc_color', '' ));?>;
		}
		.qv-description .product_meta {
			color: <?php echo esc_attr(get_option( 'cawqv_product_meta_color', '' ));?>;
		}
		.qv-description .product_meta a {
			color: <?php echo esc_attr(get_option( 'cawqv_product_meta_link_color', '' ));?>;
		}
		.qv-description .woocommerce-product-rating .star-rating, .qv-description .woocommerce-product-rating a {
			color: <?php echo esc_attr(get_option( 'cawqv_product_review_color', '' ));?>;
		}
		.qv-description p.price {
			color: <?php echo esc_attr(get_option( 'cawqv_product_price_color', '' ));?>;
		}
		button.caqv-open-modal {
			<?php echo cawqv_set_css_by_option( 'background-color', 'cawqv_action_button_bg' ); ?>
			<?php echo cawqv_set_css_by_option( 'border-color', 'cawqv_action_button_bg' ); ?>
			<?php echo cawqv_set_css_by_option( 'color', 'cawqv_action_button_text' ); ?>
		}
		button.caqv-open-modal:hover {
			<?php echo cawqv_set_css_by_option( 'background-color', 'cawqv_action_button_bg_hover' ); ?>
			<?php echo cawqv_set_css_by_option( 'border-color', 'cawqv_action_button_bg_hover' ); ?>
		}
		.cawqv-open .bg-wg-modal .wg-modal{border-radius: <?php echo esc_attr(get_option('modal_radius','')) . 'px';?>; overflow:hidden}
		.cawqv-open .bg-wg-modal .wg-modal{width: <?php echo esc_attr(get_option('modal_width','')) . '%';?>;}
  </style>
<?php }
add_action( 'wp_head', 'cawqv_custom_css_output');