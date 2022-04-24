<?php 
/**
 * 
 * Version: 1.0.0.0
 */

defined('ABSPATH') || exit;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( ! class_exists( 'CA_Framework\Loader' ) ){

    define( 'CA_FRAMEWORK_URL', plugins_url("/", __FILE__) );
    include __DIR__ . '/loader.php';
}

