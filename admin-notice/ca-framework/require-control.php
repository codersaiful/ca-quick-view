<?php 
namespace CA_Framework;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( ! class_exists( 'CA_Framework\Require_Control' ) ){


    class Require_Control
    {
        private $plugin_slug;
        private $plugin_slug_pure;
        private $this_slug;
        private $plugins = array();
        private $plugin = array();
        private $this_plugin = array();
        private $plugin_name;
        private $this_plugin_name;
        private $args = array();

        private $status;

        public $download_link;
        public $this_download_link;

        public $required = false;


        private $sample_plugin = array(
            'Name' =>   'Requrie Plugin',
            'PluginURI' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
        );
        /**
         * Controller of Manage required/recommended plugin.
         * This controller will work only for wp repo. it will not work for github repo.
         * 
         *
         * @param String $req_plugin_slug Plugin's slug with file directory. such: woocommerce/woocommerce.php
         * @param String $this_slug Own plugin slug, where you want to set condition
         * @param array $args All other data, we will collect over here. Such: Plugin name, and location.
         */
        public function __construct( $req_plugin_slug,$this_slug, $args = array() )
        {

            $this->plugin_slug = $req_plugin_slug;

            //Pase Perperty generating, If already our required plugin is installed.
            if( is_plugin_active( $this->plugin_slug ) ) return;

            $this->plugin_slug_pure = strtok( $this->plugin_slug, '/' );
            $this->this_slug = $this_slug;
            $this->args = is_array( $args ) ? array_merge( $this->sample_plugin, $args ) : $this->sample_plugin;

            $this->plugins = get_plugins();
            $this->plugin = $this->get_plugin();
            $this->this_plugin = $this->get_this_plugin();
            // if( empty( $this->plugin ) ){
            //     $this->plugin = $this->args;
            // }
            $this->plugin_name = $this->get_plugin_name();
            $this->this_plugin_name = $this->get_this_plugin_name();
            
            $this->status = $this->check_status();

        }
        

        public function run()
        {
            //Check Admin User
            if( ! is_admin() ) return;

            // Return null, If already our required plugin is installed.
            if( is_plugin_active( $this->plugin_slug ) ) return;

            //Return Null Controll;
            if( isset( $_GET['action'] ) && ( $_GET['action'] == 'install-plugin' || $_GET['action'] == 'activate' ) ) return;
            
            //Test Perpose
            add_action( 'admin_notices', [ $this, 'display_test_notice' ] );
        }

        public function return_null()
        {
            if( isset( $_GET['action'] ) && ( $_GET['action'] == 'install-plugin' || $_GET['action'] == 'activate' ) ) return;
        }

        /**
         * It's Very important, If already not set over third argument of this class constructor
         *
         * @param array $args
         * @return object
         */
        public function set_args( $args )
        {
            $this->args = is_array( $args ) ? array_merge( $this->sample_plugin, $args ) : $this->sample_plugin;
            return $this;
        }

        public function set_download_link( $download_link )
        {
            $this->download_link = $download_link;
            return $this;
        }
        public function set_required()
        {
            $this->required = true;
            return $this;
        }
        public function set_this_download_link( $this_download_link )
        {
            $this->this_download_link = $this_download_link;
            return $this;
        }

        

        public function get_plugins()
        {
            return $this->plugins;
        }

        /**
         * If originally Plugin in get_plugins() list, then it will return a array list of this
         * existing plugin. Otherwise, it will return an empty array.
         * 
         * I will use $this->get_plugin bcz I set a default array for this property.
         *
         * @return array
         */
        private function get_plugin()
        {
            return $this->plugins[$this->plugin_slug] ?? array();
        }

        private function get_this_plugin()
        {
            return $this->plugins[$this->this_slug] ?? array();
        }


        
        /**
         * It will return a name of Plugin.
         * If plugin already available in plugin list, then it will return Original name,
         * otherwise, it will come from $args
         *
         * @return String|null
         */
        private function get_plugin_name()
        {
            return $this->plugin['Name'] ?? null;
        }


        private function get_this_plugin_name()
        {
            return $this->this_plugin['Name'] ?? null;
        }


        private function check_status(){
            if( ! $this->plugin_name ) return 'install';
            if( ! is_plugin_active( $this->plugin_slug ) ) return 'activate';
        }

        public function gen_link()
        {
            $url = '';
            if($this->status == 'install'){
                $url = wp_nonce_url( self_admin_url( 'update.php?action=' . $this->status . '-plugin&plugin=' . $this->plugin_slug_pure ), $this->status . '-plugin_' . $this->plugin_slug_pure );
            }
            if($this->status == 'activate'){
                $url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $this->plugin_slug . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $this->plugin_slug );
            }

            return $url;
        }

        public function get_final_plugin_name()
        {
            return $this->plugin_name ? $this->plugin_name : $this->args['Name'];
        }

        /**
         * Get required plugin name with link or strong, if not found download link
         *
         * @return String
         */
        public function get_full_plugin_name()
        {
            $p_name = $this->get_final_plugin_name();
            if( $this->download_link ){
                $plugin_link = "<a href='{$this->download_link}' target='_blank'>{$p_name}</a>";
            }else{
                $plugin_link = "<strong>{$p_name}</strong>";
            }
            return $plugin_link;
        }

        /**
         * Get This plugin name with link or strong, if not found download link
         *
         * @return String
         */
        public function get_full_this_plugin_name()
        {
            $p_name = $this->this_plugin_name;
            if( $this->this_download_link ){
                $plugin_link = "<a href='{$this->this_download_link}' target='_blank'>{$p_name}</a>";
            }else{
                $plugin_link = "<strong>{$p_name}</strong>";
            }
            return $plugin_link;
        }

        public function get_order_message()
        {
            if( $this->status == 'install' ) return __( 'to be Install and Activated.', 'ca-framework' );
            if( $this->status == 'activate' ) return __( 'to be Activated.', 'ca-framework' );
            if( $this->status == 'upgrade' ) return __( 'to be Upgrade Version.', 'ca-framework' );
        }




        public function display_test_notice(){

            //Check User Permission 
            if ( ! current_user_can( 'activate_plugins' ) ) return;

            $recommend = $this->required ? __( 'Requires', 'ca-framework' ) : __( 'Recommends', 'ca-framework' );
            $order_message = $this->get_order_message();
        
            $p_name = $this->get_full_plugin_name(); //Requried plugin full name, with strong or download link
            $this_p_name = $this->get_full_this_plugin_name(); //This onw plugin full name, with strong or download link
            
            $message = "$this_p_name $recommend $p_name $order_message";
            ?>
            <div class="<?php echo esc_attr( $this->status ); ?> ca-reuire-plugin-notice notice notice-error">
                <p class="ca-require-plugin-msg" ><?php echo wp_kses_post( $message ); ?></p>
                <p class="ca-button-collection">
                    <a href="<?php echo esc_url( $this->gen_link() ); ?>" class="ca-button"><?php echo esc_attr( $this->status ); ?></a>
                </p>
            <?php
            // var_dump($this->args);
            // echo sprintf();
            // var_dump($this->this_plugin);
            // var_dump($this->get_plugin(),$this->plugin);
            // var_dump($this->get_plugins());
            
            ?>

            </div>
            <?php 
        }
    }
}
