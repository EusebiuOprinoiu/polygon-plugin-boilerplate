<?php
/**
 * Plugin Name:       Polygon Plugin Boilerplate
 * Plugin URI:        https://polygonthemes.com/plugins/polygon-plugin
 * Author:            Polygon Themes
 * Author URI:        https://polygonthemes.com
 * Description:       Polygon Plugin Boilerplate is a standardized, organized, object-oriented foundation for building high-quality WordPress plugins.
 * Version:           1.0.0
 * Requires PHP:      7.2
 * Requires at least: 5.0
 *
 * Text Domain:       polygon-plugin
 * Domain Path:       /languages/
 *
 * License:           GPLv3 or later
 * License URI:       https://choosealicense.com/licenses/gpl-3.0
 *
 * This program is free software.
 * You can redistribute it and/or modify it under the terms of GNU General Public License,
 * as published by the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY.
 * Without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * For more details, see the GNU General Public License.
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * Abort if this file is called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}





/**
 * Define plugin constants.
 */
define( 'POLYGON_PLUGIN_VERSION', '1.0.0' );                         // Current plugin version.
define( 'POLYGON_PLUGIN_NAME', 'polygon-plugin' );                   // Unique plugin identifier.

define( 'POLYGON_PLUGIN_MAIN_FILE', __FILE__ );                      // Path to main plugin file.
define( 'POLYGON_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );    // Path to plugin directory.
define( 'POLYGON_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );      // URL to plugin directory.





/**
 * Activate Polygon Plugin.
 *
 * Code that runs during the plugin activation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function activate_polygon_plugin( $network_wide ) {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-activator.php';
	Polygon_Plugin_Activator::activate( $network_wide );
}
register_activation_hook( POLYGON_PLUGIN_MAIN_FILE, 'activate_polygon_plugin' );





/**
 * Deactivate Polygon Plugin.
 *
 * Code that runs during the plugin deactivation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function deactivate_polygon_plugin( $network_wide ) {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-deactivator.php';
	Polygon_Plugin_Deactivator::deactivate( $network_wide );
}
register_deactivation_hook( POLYGON_PLUGIN_MAIN_FILE, 'deactivate_polygon_plugin' );







/**
 * Run Polygon Plugin.
 *
 * Load and execute the code of our plugin if all requirements are met.
 *
 * @since 1.0.0
 */
function run_polygon_plugin() {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-requirements.php';
	$requirements = new Polygon_Plugin_Requirements();

	if ( $requirements->check() ) {
		require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin.php';
		$plugin = new Polygon_Plugin();
		$plugin->run();
	}
}
run_polygon_plugin();
