<?php
/**
 * Quick view Conetnt template.
 *
 * @package ca-woocommerce-quick-view
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
while ( have_posts() ) :
	the_post(); ?>
	<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
		<div class="qv-row">
			<div class="qv-col pl-0">
				<?php 
					do_action('cawqv_view_product_image');
					do_action('cawqv_show_product_sale_flash'); 
				?>
			</div>
			<div class="qv-col">
				<div class="qv-description">
					<div class="qv-inner">
						<?php do_action('cawqv_product_content');?>
					</div>
				</div>
			</div>
		</div>
</div>

<?php
endwhile;