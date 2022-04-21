<?php 
namespace CA_Framework;
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( ! class_exists( 'CA_Framework\Require_Control' ) ){


    class Require_Control
    {
        private $plugin_slug;
        private $plugins = array();
        private $plugin = array();
        private $plugin_name;
        private $args = array();
        public function __construct( $plugin_full_slug, $args = array() )
        {
            $sample_plugin = array(
                'Name' =>   'Requrie Plugin',
                'PluginURI' => 'https://profiles.wordpress.org/codersaiful/#content-plugins',
            );
            $this->plugin_slug = $plugin_full_slug;
            $this->args = is_array( $args ) ? array_merge( $sample_plugin, $args ) : $sample_plugin;

            $this->plugins = get_plugins();
            $this->plugin = $this->get_plugin();
            if( empty( $this->plugin ) ){
                $this->plugin = $this->args;
            }
            $this->plugin_name = $this->get_plugin_name();
            

            //Test Perpose
            add_action( 'admin_notices', [ $this, 'display_test_notice' ] );
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








        public function display_test_notice(){
            ?>
            <div class="notice notice-error is-dismissible">
            <?php
            var_dump($this->plugin_name);
            var_dump($this->get_plugin(),$this->plugin);
            // var_dump($this->get_plugins());
            
            ?>

            </div>
            <?php 
        }
    }
}
