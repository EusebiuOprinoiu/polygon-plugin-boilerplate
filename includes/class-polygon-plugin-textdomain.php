<?php
/**
 * Prepare the plugin for translation
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */

defined( 'ABSPATH' ) || exit;





/**
 * Prepare the plugin for translation.
 *
 * Load and define the internationalization files making the plugin ready for
 * translation.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Textdomain {

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}





	/**
	 * Load the plugin textdomain.
	 *
	 * The plugin tries to load the files from the global /languages/ folder first.
	 * If it can't find any, it will load the files from the local /languages/ folder.
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'polygon-plugin', false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}
}
