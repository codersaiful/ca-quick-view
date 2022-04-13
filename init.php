<?php
/**
 * Plugin Name: Quick View by Code Astrology
 * Plugin URI: https://codeastrology.com/
 * Description: Quick view for WooCommerce product.
 * Version: 1.0
 * Author: CodeAstrology
 * Author URI: https://profiles.wordpress.org/codersaiful/
 * Requires at least: 5.2
 * Tested up to: 5.9.3
 * Requires PHP: 7.0
 * Text Domain: cawqv
 * Domain Path: /languages/
 * License: GPL2+
 *
 * @package ca-quick-view
 */

if (!defined('ABSPATH')){
    exit;
}
if (!function_exists('activate_lite'))
{
    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-activator.php
     */
    function activate_lite(){
        require_once plugin_dir_path(__FILE__) . 'includes/class-activator.php';
        Lite_Activator::activate();
    }
}
//Activation Hook
register_activation_hook(__FILE__, 'activate_lite');

//Define constants.

define('CAWQV_PATH', untrailingslashit(plugins_url(basename(plugin_dir_path(__FILE__)) , basename(__FILE__))));
define('CAWQV_BASE', plugin_basename(__FILE__));
define('CAWQV_INC_DIR', untrailingslashit(plugin_dir_path(__FILE__) . 'includes'));
define('CAWQV_DIR', untrailingslashit(plugin_dir_path(__FILE__)));
define('CAWQV_CUSTOMIZER_PATH', untrailingslashit(plugins_url(basename(plugin_dir_path(__FILE__)) , basename(__FILE__)) . '/includes/cutomizer-controls/controls'));


//Plugin Init Class
class CAWQV_PLUGIN_LITE
{
    const CAWQV_VERSION = '1.0';
   

    function __construct(){
        //Script hook.
        add_action('wp_enqueue_scripts', array($this,'cawqv_load_scripts'));
        add_action('admin_enqueue_scripts', array($this,'cawqv_admin_style'));
		//Load Main
        $this->cawqv_load();
		// Initialize the filter hooks.
		$this->action_link_filters();
    }

    /**
     * Add Scripts
     *
     * @since 1.0
     */
    public function cawqv_load_scripts(){
        wp_enqueue_style('animate_css', CAWQV_PATH . '/assets/css/animate.min.css', self::CAWQV_VERSION);
        wp_enqueue_style('font_icon_css', $this->cawqv_assets_path() . '/icon-picker/assets/css/fontello.css', self::CAWQV_VERSION);
        wp_enqueue_style('modal_box', CAWQV_PATH . '/assets/css/modal-box.css', self::CAWQV_VERSION);
        wp_enqueue_style('slider', CAWQV_PATH . '/assets/css/swiper-bundle.min.css', self::CAWQV_VERSION);
        wp_enqueue_style('perfect-scroll', CAWQV_PATH . '/assets/css/perfect-scrollbar.css', self::CAWQV_VERSION);
        wp_enqueue_style('cawqv-style', CAWQV_PATH . '/assets/css/style.css', self::CAWQV_VERSION);
        wp_enqueue_style('cawqv_css');

        wp_enqueue_script('jquery');
        wp_enqueue_script('cawqv-modal-box', CAWQV_PATH . '/assets/js/modal-box.js', self::CAWQV_VERSION);
        wp_enqueue_script('cawqv-slider-js', CAWQV_PATH . '/assets/js/swiper-bundle.min.js', self::CAWQV_VERSION);
        wp_enqueue_script('cawqv-perfect-scrollbar-js', CAWQV_PATH . '/assets/js/perfect-scrollbar.min.js', self::CAWQV_VERSION);
        wp_enqueue_script('custom-js', CAWQV_PATH . '/assets/js/custom.js', self::CAWQV_VERSION);
    }

	/**
	 * Add plugin action Filter
	 */
	public function action_link_filters() {
		add_filter( 'plugin_action_links', array( $this, 'cawqv_plugin_action_links' ), 10, 2 );
	}
	/**
	 * Add plugin action menu
	 *
	 * @param array  $links
	 * @param string $file
	 *
	 * @return array
	 */
	public function cawqv_plugin_action_links( $links, $file ) {

		if ( CAWQV_BASE == $file ) {
			$new_links = sprintf( '<a href="%s">%s</a>', wp_customize_url(), __( 'Settings', 'cawqv' ) );

			array_unshift( $links, $new_links );

			//$links['go_pro'] = sprintf( '<a target="_blank" href="%1$s" style="color: #00be28; font-weight: 700;">Go Premium!</a>', '#' );
		}

		return $links;
	}
 

    /**
     * Admin Style
     *
     * @since 1.0
     */
    static function cawqv_admin_style(){
        wp_enqueue_style('admin-style', CAWQV_PATH . '/assets/css/admin-style.css');
    }
    /**
     * Define Customizer control dir
     *
     * @since 1.0
     */
    static function cawqv_dir(){
        $controls_dir = CAWQV_INC_DIR . '/customizers/cutomizer-controls/controls';
        return $controls_dir;
    }
    /**
     * Define Customizer control path
     *
     * @since 1.0
     */
    static function cawqv_assets_path(){
        $assets_path = CAWQV_PATH . '/includes/customizers/cutomizer-controls/controls/';
        return $assets_path;
    }
    /**
     * WooCommerce activation Check
     *
     * @since 1.0
     */
    public function cawqv_load(){
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){
            require_once CAWQV_DIR . '/plugin.php';
            require_once CAWQV_DIR . '/includes/admin/class-admin-notice.php';
            require_once CAWQV_INC_DIR . '/customizers/customizer.php';
            require_once CAWQV_INC_DIR . '/style.php';
        }
    }
}

new CAWQV_PLUGIN_LITE();


