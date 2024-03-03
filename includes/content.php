<?php
/**
 * IT'S NOT USING, GO TO templates folder. plz
 * 
 * Quick view Conetnt template.
 *
 * @package ca-woocommerce-quick-view
 */
$load_head = $_POST['load_head'] ?? false;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
while ( have_posts() ) :
	the_post(); ?>
	<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
		<div class="qv-row">
			<?php 
			cawqv_thumb_image();
			// do_action( 'cawqv_product_image_area' );
			 ?>
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
if($load_head < 1){

}