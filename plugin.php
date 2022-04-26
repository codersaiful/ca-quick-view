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

        add_action('wp_ajax_get_product', array($this,'cawqv_get_product_callback'));
        // If you want not logged in users to be allowed to use this function as well, register it again with this function:
        add_action('wp_ajax_nopriv_get_product', array($this,'cawqv_get_product_callback'));
        add_action('wp_footer', array($this,'cawqv_add_ajax_script'));
        add_action('wp_footer', array($this,'cawqv_modal'));
        add_action('woocommerce_after_shop_loop_item', array($this,'cawqv_modal_button'));

        //WooCommerce Hook
        add_action('cawqv_show_product_sale_flash', 'woocommerce_show_product_sale_flash');
        add_action('cawqv_product_content', 'woocommerce_template_single_title', 5);
        add_action('cawqv_product_content', 'woocommerce_template_single_rating', 10);
        add_action('cawqv_product_content', 'woocommerce_template_single_price', 15);
        add_action('cawqv_product_content', 'woocommerce_template_single_excerpt', 20);
        add_action('cawqv_product_content', 'woocommerce_template_single_add_to_cart', 25);
        add_action('cawqv_product_content', 'woocommerce_template_single_meta', 30);

        //Action for Add to cart
        add_action('wp_enqueue_scripts', array( $this,'cawqv_woocommerce_ajax_add_to_cart_js'));
        add_action('wp_ajax_woocommerce_ajax_add_to_cart', array($this,'cawqv_woocommerce_ajax_add_to_cart'));
        add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', array($this,'cawqv_woocommerce_ajax_add_to_cart'));
        add_action('cawqv_view_product_image', array($this,'cawqv_image') , 20);

        //add_action( $hook, $function_to_add, $priority, $accepted_args );
        add_action('cawqv_product_gallery', array($this,'cawqv_product_gallery') , 'class', 2);
    }

    /**
     * View button for actions
     *
     * @since      1.0.0
    */
    public function cawqv_modal_button(){
        global $product;
        $product_id      = $product->get_id();
        $qv_button_label = get_option('qv_button_label', 'Qiuck View') ;
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

    public function cawqv_get_product_callback(){
        // retrieve post_id, and sanitize it to enhance security
        if (!isset($_POST['id'])){
            die();
        }
        $product_id = intval($_POST['id']);

        wp('p=' . $product_id . '&post_type=product');
        ?>
		<?php
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
    public function cawqv_modal(){

        $icon = get_option('cawqv_icon_picker', 'cawqv-icon-close');
        $close_container = ($icon == 'default') ? '<div class="wg-modal-close">&times;</div>' : '<div class="wg-modal-close"><i class="' . $icon . '"></i></div>';

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

        echo wp_kses( $output ,$allowed_html );

    }

    /**
     * Ajax Add to cart script enqueue
     *
     * @since      1.0.0
     */

    public function cawqv_woocommerce_ajax_add_to_cart_js(){

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
    public function cawqv_woocommerce_ajax_add_to_cart(){

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
    public function cawqv_product_gallery($class){

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
    public function cawqv_add_ajax_script(){
        global $woocommerce;
        ?>
		<script>
            jQuery(document.body).on('click','.caqv-open-modal',function(){

                var $id =  jQuery(this).data('id');
                jQuery("#cawqv-modal").show();
                jQuery("body").addClass('cawqv-open');

                jQuery(this).append('<div class="loader-wrap"><div id="loader"></div></div>');
                
                jQuery.ajax({
                    type: 'POST',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        'id': $id,
                        'action': 'get_product' //this is the name of the AJAX method called in WordPress
                    },
                    success: function (result) {
                    jQuery('#modal_container').html(result); 
                        var modal = jQuery(".cawqv-modal").wgModal({
                            responsive:{
                                0: {
                                    innerScroll: true,
                                    onBeforeOpen    : function(e) {
                                        jQuery('.qv-inner').removeClass('ps--active-y');
                                    },
                                },
                            },
                            onBeforeOpen    : function(e) {
                                jQuery('body').css('overflow','hidden');
                            },
                            onAfterClose: function (e) {
                                jQuery('body').css('overflow','auto');
                                jQuery("#cawqv-modal").hide();
                                jQuery("body").removeClass('cawqv-open');
                            },
                        });
                        modal.openModal();

                        jQuery('.loader-wrap').remove();

                        //Slider Init
                        var galleryTop = new Swiper(".galleryTop", {
                            grabCursor: true,
                            navigation: {
                                nextEl: ".swiper-button-next",
                                prevEl: ".swiper-button-prev"
                            },
                            loop: true,
                            loopedSlides: 4,
                            keyboard: {
                                enabled: true,
                                onlyInViewport: false
                            }
                            });
                            /* thumbs */
                            var galleryThumbs = new Swiper(".gallery-thumbs", {
                            spaceBetween: 5,
                            centeredSlides: true,
                            slidesPerView: "auto",
                            touchRatio: 0.4,
                            slideToClickedSlide: true,
                            loop: false,
                            loopedSlides: 4,
                            keyboard: {
                                enabled: true,
                                onlyInViewport: false
                            }
                            });

                            /* set conteoller  */
                            galleryTop.controller.control = galleryThumbs;
                            galleryThumbs.controller.control = galleryTop;
                    
                        //const ps = new PerfectScrollbar('.qv-inner', {});
                    },
                    complete: function(){
                        cawqvLoadVariationScript();
                    },
                    error: function() {
                        console.log("error");
                    }
                    
                });

                /**
                 * Load variation Scripts
                 *
                 * @since      1.0.0
                 */
                function cawqvLoadVariationScript() {
                    jQuery.getScript('<?php echo $woocommerce->plugin_url(); ?>/assets/js/frontend/add-to-cart-variation.min.js');
                    jQuery.getScript('<?php echo plugin_dir_url(__FILE__); ?>/assets/js/woo-ajax-add-to-cart.js');
                }



            });

		</script>
		<?php
    }

} //End Class

 new CAWQV_FRONTEND();