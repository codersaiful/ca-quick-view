<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class CA_Admin_Notice
{
	const VERSION ='1.0';
	const PLUGIN_NAME ='Quick View';
    const PREFIX = 'ca';
	
	/**
     * Constructor
     */
    public function __construct(){
        $this->show_notification_on_time();
        add_action("admin_enqueue_scripts", [$this, "enqueue"]);
        add_action("wp_ajax_update_notice_status", [$this, "update_notice_status"]);
    }
  
    /**
     * Enqueue Scripts
     */
    public function enqueue(){
        wp_enqueue_style(
            "ca-notice-css",
            $this->plugin_path() . "assets/css/ca-notification.css",
            []
        );
		wp_enqueue_script(
            "ca-notice-update-js",
            $this->plugin_path() . "assets/js/ajax-update.js",
            "",
            self::VERSION,
            false
        );

        wp_localize_script("ca-notice-update-js", "ajaxobj", [
            "ajaxurl" => admin_url("admin-ajax.php"),
        ]);
    }
	/**
     * Notice Title
     */
	public static function plugin_name(){
		echo esc_html(self::PLUGIN_NAME,'ca-admin-notice');
	}
	/**
     * Notice Message
     */
	public static function before_message(){
        echo esc_html( 'Thank you for using', 'ca-admin-notice' );
	}
    public static function after_message(){
        echo esc_html( 'To get more amazing features and the outstanding pro ready-made layouts, please get the', 'ca-admin-notice' );
	}
	/**
     * plugin path
     */
	 public function plugin_path(){
		$assets_path = plugins_url("/", __FILE__);
		return $assets_path;
	  }
	 
	/**
     * Update Option by Ajax
     */
    public function update_notice_status(){
        update_option(self::PREFIX . "_admin_notice", self::PREFIX . "_dont_show");
        update_option(self::PREFIX .'_notice_close_date', current_time( 'timestamp' ) );
    }
	/**
     * Notice show if condition meet
     */
	public function show_notification_on_time(){
        //$get_option             = get_option("ca_admin_notice");
        $ca_notice_close_date   = get_option("ca_notice_close_date");
        $close_date		        = date("Y-m-d", $ca_notice_close_date);

		$date				    = new DateTime($close_date);
		$now 				    = new DateTime();
		$date_diff 			    = $date->diff($now)->format("%d");
        
        //Manual value for test
		//$date_diff 			    = 15;

       /*  if( $get_option!=self::PREFIX .'_dont_show' ){
			add_action("admin_notices", [$this, "notice_output4"]);
		} */
        if($date_diff>= 5 ){
			add_action("admin_notices", [$this, "notice_output4"]);
		}
       
        //add_action("admin_notices", [$this, "notice_output"]);
		//add_action("admin_notices", [$this, "notice_output2"]);
		//add_action("admin_notices", [$this, "notice_output3"]);
		//add_action("admin_notices", [$this, "notice_output4"]);
		
	}

    /**
     * Add link for pro or others usage
     * @param string $class, $url, $link
     */
    
    public function notice_link( $url, $link_text, $class){
       echo $settings 	= '<a class="'.$class.'" href="' .$url .'">'. $link_text . '</a>';
    }
	/**
     * Notice Output
     */
    public function notice_output(){
    ?>
	 <div class='notice ca-notice notice-success'>
        <div class="ca-notice-content">
            <p>
                <?php self::before_message();?>
                <?php self::plugin_name();?>
                <?php self::after_message();?>
                <?php self::notice_link('#','Go Settings', 'ca-success');?>
                <button class="ca-notice-dismiss"></button>
            </p>
        </div>
      </div>
	 <?php
    }

    public function notice_output2(){
        ?>
         <div class='notice ca-notice notice-warning'>
            <div class="ca-notice-content">
                <p>
                    <?php self::before_message();?>
                    <?php self::plugin_name();?>
                    <?php self::after_message();?>
                    <?php self::notice_link('#','Go Premium', 'ca-warning');?>
                    <button class="ca-notice-dismiss"></button>
                </p>
            </div>
          </div>
         <?php
        }

        public function notice_output3(){
            ?>
             <div class='notice ca-notice notice-error'>
                <div class="ca-notice-content">
                    <div class="ca-logo">
                        <img src="<?php echo $this->plugin_path() .
                            "assets//img/InPlugin-Notice-1.gif"; ?>" >
                    </div>
                    <div class="ca-msg-text">
                        <p>
                            <?php self::before_message();?>
                            <?php self::plugin_name();?>
                            <?php self::after_message();?>
                            <?php self::notice_link('#','Go to Offer', 'ca-error');?>
                            <button class="ca-notice-dismiss"></button>
                        </p>
                    </div>
                </div>
              </div>
             <?php
            }

            public function notice_output4(){
                ?>
                 <div class='notice ca-notice notice-info'>
                    <div class="ca-notice-content">
                        <div class="ca-logo">
                            <img src="<?php echo $this->plugin_path() .
                                "assets//img/long-adv.jpg"; ?>" >
                                <button class="ca-notice-dismiss"></button>
                        </div>
                        <div class="ca-msg-text">
                        <p>
                            <?php self::before_message();?>
                            <?php self::plugin_name();?>
                            <?php self::after_message();?>
                            <?php self::notice_link('#','Go to Offer', 'ca-error');?>
                            <button class="ca-notice-dismiss"></button>
                        </p>
                    </div>
                    </div>
                  </div>
                 <?php
                }
}

$notice = new CA_Admin_Notice();

