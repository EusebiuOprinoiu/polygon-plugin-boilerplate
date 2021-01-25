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
	 * Actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}





	/**
	 * Load the plugin textdomain for translation.
	 *
	 * The plugin tries to load the files from the global /languages/ folder first.
	 * If it can't find any, it will load the files from the local /languages/ folder.
	 *
	 * Global folder: wp-content/languages/plugins/polygon-plugin-en_US.mo
	 * Local folder:  wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain( POLYGON_PLUGIN_SLUG, false, plugin_basename( POLYGON_PLUGIN_DIR ) . '/languages/' );
	}
}
