<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    ca-woocommerce-quick-view
 * @author     BM Rafiul Alam <bmrafiul.alam@gmail.com>
 */

class Lite_Activator {
	/**
	 * When plugin activate work activate function.
	 *
	 * @since      1.0
	 */
	public static function activate() {
		deactivate_plugins( 'ca-quick-view-premium/init.php' );
	}
}
