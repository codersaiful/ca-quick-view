<?php
if (!defined('ABSPATH')) exit;
  /**
     * View button for actions
     *
     * @since      1.0.0
     * @package    ca-quick-view
     * @author     Saiful <codersaiful@gmail.com>
    */

class CAWQV_FRONTEND
{

    function __construct(){

        add_action('wp_ajax_get_product', array($this,'get_product_callback'));
        // If you want not logged in users to be allowed to use this function as well, register it again with this function:
        add_action('wp_ajax_nopriv_get_product', array($this,'get_product_callback'));
        // add_action('wp_footer', array($this,'add_ajax_script'));
        add_action('wp_footer', array($this,'modal'));
        add_action('woocommerce_after_shop_loop_item', array($this,'modal_button'));

        //WooCommerce Hook
        add_action('cawqv_show_product_sale_flash', 'woocommerce_show_product_sale_flash');
        add_action('cawqv_product_content', 'woocommerce_template_single_title', 5);
        add_action('cawqv_product_content', 'woocommerce_template_single_rating', 10);
        add_action('cawqv_product_content', 'woocommerce_template_single_price', 15);
        add_action('cawqv_product_content', 'woocommerce_template_single_excerpt', 20);
        add_action('cawqv_product_content', 'woocommerce_template_single_add_to_cart', 25);
        add_action('cawqv_product_content', 'woocommerce_template_single_meta', 30);

        //Action for Add to cart
        add_action('wp_enqueue_scripts', array( $this,'woocommerce_ajax_add_to_cart_js'));
        add_action('wp_ajax_woocommerce_ajax_add_to_cart', array($this,'woocommerce_ajax_add_to_cart'));
        add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', array($this,'woocommerce_ajax_add_to_cart'));
        add_action('cawqv_view_product_image', array($this,'cawqv_image') , 20);

        //add_action( $hook, $function_to_add, $priority, $accepted_args );
        add_action('cawqv_product_gallery', array($this,'product_gallery') , 'class', 2);


        // Hook into the template_include filter
        add_filter('template_include', [$this,'custom_product_template']);
    }


    // Add the following code to your plugin file or theme's functions.php file

public function custom_product_template($template) {
    global $wp_query;
    // dd($wp_query->is_singular);
    // dd($wp_query->get_queried_object());
    // Check if the query parameters are present
    if (isset($_GET['product_id']) && isset($_GET['template'])) {

        

        
        // Get the product ID and template from the URL
        $product_id = intval($_GET['product_id']);
        $template_name = sanitize_text_field($_GET['template']);

        // Check if the product exists and the template is valid
        if ($product_id && wc_get_product($product_id) ) { //&& is_valid_template($template_name)
        
            // Define the path to your custom template file
            $custom_template_path = plugin_dir_path(__FILE__) . 'templates/' . $template_name . '.php';
            // dd($custom_template_path);
            // // Check if the custom template file exists
            if (file_exists($custom_template_path)) {
                return $custom_template_path;
            }
        }
    }

    // Return the default template if no custom template is found
    return $template;
}



    /**
     * View button for actions
     *
     * @since      1.0.0
    */
    public function modal_button(){
        global $product;
        $product_id      = $product->get_id();
        $qv_label = __( 'Quick View', 'cawqv' );
        $qv_button_label = get_option('qv_button_label', $qv_label ) ;
        $qv_button_label = __( $qv_button_label, 'cawqv' );
        ?>
		<button type="button" class="caqv-open-modal" 
		data-id="<?php echo esc_attr($product_id); ?>" >
			<i class="btn-icon <?php echo esc_attr(get_option('cawqv_general_section', 'cawqv-icon-search')); ?>"></i>
			<span><?php echo esc_html($qv_button_label, 'cawqv') ?> </span>
		</button>
	<?php
    }

     /**
     * Get ID and content by Ajax
     *
     * @since      1.0.0
     */

    public function get_product_callback(){
        // retrieve post_id, and sanitize it to enhance security
        if (!isset($_POST['id'])){
            die();
        }
        $product_id = intval($_POST['id']);

        wp('p=' . $product_id . '&post_type=product');
        ?>
		<?php
        // $template = CAWQV_DIR . '/templates/';

        // ob_start();
        // wc_get_template( 'view-ontent.php', array(), '', $template );
        // $html = ob_get_contents();  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        // ob_end_clean();
        // echo $html;
        // die();
        
        ob_start();

       include_once ('includes/content.php');

        echo ob_get_clean();

        // Must die() the function
        die();
    }

    /**
     * Prpeared image content
     *
     * @since      1.0.0
     */
    public static function cawqv_image(){
       include_once ('includes/image-content.php');
    }

    /**
     * The modal body
     *
     * @since      1.0.0
     */
    public function modal(){

        $icon = get_option('cawqv_icon_picker', 'cawqv-icon-close');
        $close_container = ($icon == 'default') ? '<div class="remodal-modal-close">&times;</div>' : '<div class="remodal-modal-close"><i class="' . $icon . '"></i></div>';

        $output = '<div id="cawqv-modal" class="cawqv-modal" style="display:none">';
        $output .= $close_container;
        $output .= '<div id="modal_container"></div>';
        $output .= '</div>';

        $allowed_html = array(
                'div' => array(
                'id'    => array(),
                'style'    => array(),
                'class'    => array(),
             ),
             'i'    => array(
                'class'    => array(),
             ),
        );

        // echo wp_kses_post( $output ,$allowed_html );
        echo wp_kses( $output ,$allowed_html );

    }

    /**
     * Ajax Add to cart script enqueue
     *
     * @since      1.0.0
     */

    public function woocommerce_ajax_add_to_cart_js(){

        if (function_exists('is_product') && is_product()){
            wp_enqueue_script('woocommerce-ajax-add-to-cart', plugin_dir_url(__FILE__) . 'assets/js/woo-ajax-add-to-cart.js', array(
                'jquery'
            ) , '', true);
        }
    }
     /**
     * Ajax Add to cart actions
     *
     * @since      1.0.0
     */
    public function woocommerce_ajax_add_to_cart(){

        $product_id 		= apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
        $quantity 			= empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
        $variation_id 		= absint($_POST['variation_id']);
        $passed_validation 	= apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
        $product_status 	= get_post_status($product_id);

        if ($passed_validation && WC()
            ->cart
            ->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status)
        {

            do_action('woocommerce_ajax_added_to_cart', $product_id);

            if ('yes' === get_option('woocommerce_cart_redirect_after_add'))
            {
                wc_add_to_cart_message(array(
                    $product_id => $quantity
                ) , true);
            }

            WC_AJAX::get_refreshed_fragments();
        }
        else{

            $data = array(
                'error' => true,
                'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id) , $product_id)
            );

            echo wp_send_json($data);
        }

        wp_die();
    }

     /**
     * Product Gallery 
     *
     * @since      1.0.0
     */
    public function product_gallery($class){

        global $post, $product, $woocommerce;
        if ( has_post_thumbnail() ) {
            $attachment_ids = $product->get_gallery_image_ids();
            $props          = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
            $image          = get_the_post_thumbnail(
                $post->ID,
                'shop_single',
                array(
                    'title' => $props['title'],
                    'alt'   => $props['alt'],
                )
            );
        
            echo sprintf(
                '<div class="%s">%s</div>',
                $class,
                $image // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            );

            if ( $attachment_ids ) {
                $loop = 0;

                foreach ( $attachment_ids as $attachment_id ) {

                    $props = wc_get_product_attachment_props( $attachment_id, $post );

                    if ( ! $props['url'] ) {
                        continue;
                    }

                    echo sprintf(
                        '<div class="%s">%s</div>',
                        $class,
                        wp_get_attachment_image( $attachment_id, 'shop_single', 0, $props )
                    );

                    $loop++;
                }
            }
        } else {
            echo sprintf( '<div><img src="%s" alt="%s" /></div>', wc_placeholder_img_src(), __( 'Placeholder', 'cawqv' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
  
    }
    /**
     * Animation class name in array
     *
     * @since      1.0.0
     */
    public static function cawqv_animation(){
        return [
            'default' => 'Default', 
            'fadeInUp' => 'fadeInUp', 
            'fadeInUp' => 'fadeInUp', 
            'fadeInDown' => 'fadeInDown', 
            'bounceIn' => 'bounceIn', 
            'bounceInUp' => 'bounceInUp', 
            'bounceInDown' => 'bounceInDown', 
            'bounceInRight' => 'bounceInRight', 
            'bounceInLeft' => 'bounceInLeft', 
            'backInDown' => 'backInDown', 
            'flipInX' => 'flipInX', 
            'flipInY' => 'flipInY', 
            'jackInTheBox' => 'jackInTheBox', 
            'slideInUp' => 'slideInUp', 
            'slideInDown' => 'slideInDown', 
            'rollIn' => 'rollIn', 
            'zoomIn' => 'zoomIn', 
            'zoomInUp' => 'zoomInUp', 
            'zoomInDown' => 'zoomInDown', 
        ];
    }


     /**
     * Ajax events execute
     *
     * @since      1.0.0
     */
    public function add_ajax_script(){

    }

} //End Class

 new CAWQV_FRONTEND();