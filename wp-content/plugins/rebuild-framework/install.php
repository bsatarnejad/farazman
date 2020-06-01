<?php
/*
Plugin Name: Rebuild Framework
Plugin URI: http://www.janxcode.com/
Description: Rebuild Shortcodes & Demo Manager.
Version: 1.1
Author: Janxcode
Author URI: http://www.janxcode.com/
License: commercial
License URI: commercial
Text Domain: rebuild
*/
 
$get_plugin_dir_path = dirname(__FILE__);
function shortcode_admin_styles() {
    wp_enqueue_style('style', plugin_dir_url( __file__ ). '/assets/css/style.css',true);
}
add_action('admin_print_styles', 'shortcode_admin_styles');


/**
 * Load the plugin's text domain
 *
 */
add_action('plugins_loaded', 'rebuild_load_textdomain');
function rebuild_load_textdomain() {
	load_plugin_textdomain( 'rebuild', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
}

 
require_once($get_plugin_dir_path.'/assets/index.php');


//EOF

?>