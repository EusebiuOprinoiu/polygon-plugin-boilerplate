<?php
/**
 * Prepare the plugin for translation
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





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
	 * Load plugin text-domain.
	 *
	 * Load the plugin text-domain and define the location of our translation files.
	 * See examples below:
	 *
	 * - Global /languages/ folder: wp-content/languages/plugins/polygon-plugin-en_US.mo
	 * - Local /languages/ folder:  wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
	 *
	 * If no files are found in the global languages folder the plugin uses the files available in the
	 * local folder.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), POLYGON_PLUGIN_NAME );

		// Load translation files from the global /languages/ folder.
		load_textdomain( POLYGON_PLUGIN_NAME, trailingslashit( WP_LANG_DIR ) . 'plugins/' . POLYGON_PLUGIN_NAME . '-' . $locale . '.mo' );

		// Load translation files from the local /languages/ folder.
		load_plugin_textdomain( POLYGON_PLUGIN_NAME, false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}
}
