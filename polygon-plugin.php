<?php
/**
 * Plugin Name:       Polygon Plugin Boilerplate
 * Plugin URI:        https://polygonthemes.com/plugins/polygon-plugin
 * Author:            Polygon Themes
 * Author URI:        https://polygonthemes.com
 * Description:       Polygon Plugin Boilerplate is a standardized, organized, object-oriented foundation for building high-quality WordPress plugins.
 * Version:           1.0.0
 * Requires PHP:      7.4
 * Requires at least: 5.8
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

defined( 'ABSPATH' ) || exit;





define( 'POLYGON_PLUGIN_VERSION', '1.0.0' );
define( 'POLYGON_PLUGIN_SLUG', 'polygon-plugin' );

define( 'POLYGON_PLUGIN_FILE', __FILE__ );
define( 'POLYGON_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'POLYGON_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );

define( 'POLYGON_PLUGIN_MIN_PHP_VERSION', '7.4' );
define( 'POLYGON_PLUGIN_REC_PHP_VERSION', '8.0' );





/**
 * Code that runs during the plugin activation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function activate_polygon_plugin( $network_wide ) {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-activator.php';
	Polygon_Plugin_Activator::activate( $network_wide );
}
register_activation_hook( POLYGON_PLUGIN_FILE, 'activate_polygon_plugin' );





/**
 * Code that runs during the plugin deactivation.
 *
 * @since 1.0.0
 * @param bool $network_wide Boolean value with the network-wide activation status.
 */
function deactivate_polygon_plugin( $network_wide ) {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-deactivator.php';
	Polygon_Plugin_Deactivator::deactivate( $network_wide );
}
register_deactivation_hook( POLYGON_PLUGIN_FILE, 'deactivate_polygon_plugin' );





/**
 * Load and execute if all requirements are met.
 *
 * @since 1.0.0
 */
function run_polygon_plugin() {
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin.php';
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-textdomain.php';
	require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-requirements.php';

	$textdomain = new Polygon_Plugin_Textdomain();
	$textdomain->init();

	$requirements = new Polygon_Plugin_Requirements();
	$requirements->init();

	if ( $requirements->check() ) {
		$plugin = new Polygon_Plugin();
		$plugin->run();
	}
}
add_action( 'plugins_loaded', 'run_polygon_plugin' );
