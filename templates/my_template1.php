<?php
/**
 * Now Using it. Previous is unused.
 * 
 * 
 * Quick view Conetnt template.
 *
 * @package ca-woocommerce-quick-view
 */
wp_reset_postdata();
wp_head();
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$product_id = intval($_GET['product_id']);

// Set up the query arguments
$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 1,
    'p'              => $product_id, // Specify the product ID
);

// Create a new WP_Query instance
$query = new WP_Query($args);

// Check if there are any products found
if ($query->have_posts()) {
    // Loop through the products (there should be only one)
    while ($query->have_posts()) {
        $query->the_post();

	?>
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
    }

    // Restore the global post data
    wp_reset_postdata();
} else {
    echo "Product not found";
}
wp_footer();