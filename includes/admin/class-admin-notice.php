<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class cawqv_Admin_Notice
{
	const VERSION ='1.0';
	const PLUGIN_NAME ='CA WOOCOMMERCE QUICK VIEW';
	
	/**
     * Construct
     */
    public function __construct(){
        $this->show_notification_on_time();
        add_action("admin_enqueue_scripts", [$this, "enqueue"]);
        add_action("wp_ajax_never_show", [$this, "never_show"]);
        add_action("admin_menu", [$this, "wpdocs_register_my_custom_menu_page"] );
    }
	 /**
     * Enqueue Scripts
     */
    public function enqueue(){
       
        wp_enqueue_style(
            "cawqv-notice-css",
            $this->plugin_path() . "/css/aep-notice.css",
            []
        );
		wp_enqueue_script(
            "cawqv-notice-update-js",
            $this->plugin_path() . "/js/update-notice.js",
            "",
            self::VERSION,
            false
        );

        wp_localize_script("cawqv-notice-update-js", "ajaxobj", [
            "ajaxurl" => admin_url("admin-ajax.php"),
        ]);
    }
	/**
     * Notice Title
     */
	public static function notice_title(){
		echo self::PLUGIN_NAME;;
	}
	/**
     * Notice Message
     */
	public static function notice_message(){
        echo esc_html( 'If you love this plugin please give us a five-star review of our motivation. Thanks.', 'cawqv' );
	}
	/**
     * plugin path
     */
	 public function plugin_path(){
		$assets_path = plugins_url("/", __FILE__);
		return $assets_path;
	  }
	 
	/**
     * Update Option
     */
    public function never_show(){
        update_option("cawqv_notice", "_never_show_again");
    }
	/**
     * Notice show if condition meet
     */
	public function show_notification_on_time(){
		$notification_status= get_option("cawqv_notice");
		$get_install_date	= get_option('cawqv_lite_activation_date');
		$install_date		= date("Y-m-d", $get_install_date);

		$date				= new DateTime($install_date);
		$now 				= new DateTime();
		$date_diff 			= $date->diff($now)->format("%d");
		
		if($date_diff>=1 && $notification_status!='_never_show_again' ){
			add_action("admin_notices", [$this, "notice_output"]);
		}
	}
	/**
     * Notice Output
     */
    public function notice_output(){
    ?>
	 <div class='notice aep-notice'>
        <div class="aep-notice-logo">
            <img src="<?php echo $this->plugin_path() .
                "/img/notice-img.jpg"; ?>" >
        </div>
        <div class="aep-notice-content">
            <h3><?php self::notice_title(); ?></h3>
            <p><?php self::notice_message(); ?></p>
			<p class="aep-links">
				<a href="https://wordpress.org/plugins/ca-woocommerce-quick-view" class="review">
					<i class="icon-star-empty"></i> 
					<?php echo __("Leave a Review", "cawqv"); ?>
				</a>
				<a href="#nevershow" class="never-show">
					<i class="icon-cancel-circle"></i> 
					<?php echo __("Never Show", "cawqv"); ?>
				</a>
            </p>
        </div>
      </div>
	 <?php
    }

    /**
 * Register a custom menu page.
 */
public function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'CA Quick View', 'cawqv' ),
        'CA Quick View',
        'manage_options',
        plugin_dir_path( __FILE__ ).'/settings.php',
        '',
        //$this->plugin_path() ."/img/notice-img.jpg"
        '',
       99.2
    );
}

}

$notice = new cawqv_Admin_Notice();
?>