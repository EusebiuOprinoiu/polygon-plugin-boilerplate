<?php
/**
 * The file that contains the class for internationalization
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * Define the internationalization functionality.
 *
 * Load and define the internationalization files making the plugin ready for
 * translation.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_i18n {    // phpcs:ignore

	/**
	 * Initialize the class and get things started.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Nothing yet.
	}





	/**
	 * Load plugin text-domain.
	 *
	 * Load the plugin text-domain for translation from:
	 *
	 * - Global languages folder: wp-content/languages/plugins/polygon-plugin-en_US.mo
	 * - Local languages folder: wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
	 *
	 * If no files are found in the global languages folder the plugin uses the files available in the
	 * local folder.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), POLYGON_PLUGIN_NAME );

		// Load textdomain from the global languages folder.
		load_textdomain( POLYGON_PLUGIN_NAME, trailingslashit( WP_LANG_DIR ) . 'plugins/' . POLYGON_PLUGIN_NAME . '-' . $locale . '.mo' );

		// Load textdomain from the local languages folder.
		load_plugin_textdomain( POLYGON_PLUGIN_NAME, false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}
}
