<?php
/*
Plugin Name: Polygon Plugin Boilerplate
Plugin URI: https://polygonthemes.com
Description: Polygon Plugin Boilerplate is a standardized, organized, object-oriented foundation for building high-quality WordPress Plugins. The curent version is based on the WordPress Plugin Boilerplate by Tom McFarlin.
Version: 1.0.0
Author: Polygon Themes
Author URI: https://polygonthemes.com
Text Domain: polygon-plugin
Domain Path: /languages/
License: GNU General Public License version 3.0
*/




// Abort if this file is called directly
if ( ! defined( 'WPINC' ) ) {
	die;
}




// Define the plugin name
define( 'POLYGON_PLUGIN_PLUGIN_NAME', 'polygon-plugin' );

// Define the plugin version
define( 'POLYGON_PLUGIN_VERSION', '1.0.0' );

// Define path to main plugin file
define( 'POLYGON_PLUGIN_MAIN_FILE', __FILE__ );

// Define path to plugin directory
define( 'POLYGON_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

// Define url to plugin directory
define ( 'POLYGON_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );




// The code that runs during plugin activation
function activate_polygon_plugin() {
	require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-activator.php' );
	Polygon_Plugin_Activator::activate();
}




// The code that runs during plugin deactivation
function deactivate_polygon_plugin() {
	require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-deactivator.php' );
	Polygon_Plugin_Deactivator::deactivate();
}




// Register activation and deactivation hooks
register_activation_hook( POLYGON_PLUGIN_MAIN_FILE, 'activate_polygon_plugin' );
register_deactivation_hook( POLYGON_PLUGIN_MAIN_FILE, 'deactivate_polygon_plugin' );




// load and execute plugin
function run_polygon_plugin() {
	require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin.php' );
	$plugin = new Polygon_Plugin();
	$plugin->run();
}
run_polygon_plugin();