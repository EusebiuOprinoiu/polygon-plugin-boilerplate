<?php
/*
Plugin Name: Plugin Name
Plugin URI: https://polygonthemes.com
Description: Short plugin description goes here
Version: 1.0.0
Author: Polygon Themes
Author URI: https://polygonthemes.com
Text Domain: plugin-name
Domain Path: /languages/
License: GNU General Public License version 3.0

GitHub Plugin URI: https://github.com/EusebiuOprinoiu/polygon-plugin-boilerplate
GitHub Branch: master
*/




// Abort if this file is called directly
if ( ! defined( 'WPINC' ) ) {
	die;
}




// Define the plugin name
define( 'PLUGIN_NAME_PLUGIN_NAME', 'plugin-name' );

// Define the plugin version
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

// Define path to main plugin file
define( 'PLUGIN_NAME_MAIN_FILE', __FILE__ );

// Define path to plugin directory
define( 'PLUGIN_NAME_DIR_PATH', plugin_dir_path( __FILE__ ) );

// Define url to plugin directory
define ( 'PLUGIN_NAME_DIR_URL', plugin_dir_url( __FILE__ ) );




// The code that runs during plugin activation
function activate_plugin_name() {
	require_once( PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-activator.php' );
	Plugin_Name_Activator::activate();
}




// The code that runs during plugin deactivation
function deactivate_plugin_name() {
	require_once( PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-deactivator.php' );
	Plugin_Name_Deactivator::deactivate();
}




// Register activation and deactivation hooks
register_activation_hook( PLUGIN_NAME_MAIN_FILE, 'activate_plugin_name' );
register_deactivation_hook( PLUGIN_NAME_MAIN_FILE, 'deactivate_plugin_name' );




// Load main plugin class
require( PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name.php' );




// Begin execution of the plugin
function run_plugin_name() {
	$plugin = new Plugin_Name();
	$plugin->run();
}
run_plugin_name();