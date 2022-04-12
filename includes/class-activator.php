<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    ca-woocommerce-quick-view
 * @author     Saiful <codersaiful@gmail.com>
 */

class Lite_Activator {
	/**
	 * When plugin activate work activate function.
	 *
	 * @since      1.0
	 */
	public static function activate() {
		deactivate_plugins( 'ca-woocommerce-quick-view/init.php' );
	}
	public static function set_plugin_info(){
		update_option( 'cawqv_activation_date', current_time( 'timestamp' ) );
		update_option( 'cawqv_version', CAWQV_VERSION );
	}
}
