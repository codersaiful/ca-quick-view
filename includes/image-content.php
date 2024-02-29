<?php
/**
 * Quick view image template.
 *
 * @package ca-quick-view
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="qv-image swiper galleryTop">
	<div class="swiper-wrapper">
		<?php 
		/**
		* Hook: cawqv_product_gallery.
		*
		* @hooked cawqv_product_gallery - 20 (outputs gallery content)
		* @parmas $class
		*/
		$class = 'swiper-slide qv-thumbnail woocommerce-product-gallery__image';
		do_action('cawqv_product_gallery', $class);
		?>
	</div>
	  <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
	<!--Gallery-->
	<div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
			<?php 
			/**
			* Hook: cawqv_product_gallery.
			*
			* @hooked cawqv_product_gallery - 20 (outputs gallery content)
			* @parmas $class
			*/
			do_action('cawqv_product_gallery', 'swiper-slide' );
			?>
        </div>
    </div>
</div>