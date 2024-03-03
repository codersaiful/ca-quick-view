<?php
/**
 * Undocumented function
 *
 * @param string $property
 * @param string|null|bool $value
 * @param string $valueUnit
 * @return void
 */
function cawqv_set_css($property, $value, $valueUnit = ''){
	if( empty( $value ) ) return;
	echo esc_attr( $property . ": " . $value . $valueUnit . ';' );
}
function cawqv_set_css_by_option($property, $option_key, $valueUnit = ''){
	$value = get_option( $option_key );
	cawqv_set_css($property, $value, $valueUnit);
}

function cawqv_thumb_image(){
	global $post, $product, $woocommerce;
        if ( has_post_thumbnail() ) {
			$attachment_ids = $product->get_gallery_image_ids();
            $gallary = $attachment_ids && count( $attachment_ids ) > 0 ? true : false;
			$props          = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
			$image          = get_the_post_thumbnail(
				$post->ID,
				'shop_single',
				array(
					'title' => $props['title'],
					'alt'   => $props['alt'],
				)
			);
			$class = 'swiper-slide qv-thumbnail woocommerce-product-gallery__image no-slider-images';
	?>
	<div class="qv-col pl-0 cawqv-image-area">
		<?php 
			
			if( $gallary ){
				do_action('cawqv_view_product_image');
			}else{
				
				echo sprintf(
					'<div class="%s">%s</div>',
					$class,
					$image // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
			do_action('cawqv_show_product_sale_flash'); 
		?>
	</div>
	<?php
	}
}