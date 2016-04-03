<?php
/**
 * The file that contains the class fired during plugin activation
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin activation.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Activator {

	/**
	 * Do stuff on plugin activation.
	 *
	 * Create the plugin options, set their defaults and create any required database tables
	 * on the first plugin activation.
	 *
	 * @since 1.0.0
	 */
	public static function activate() {
		// Create plugin options if not available.
		if ( ! get_option( 'polygon_plugin' ) ) {
			$polygon_plugin = array(
				'plugin-version'       => POLYGON_PLUGIN_VERSION,
				'last-updated-version' => POLYGON_PLUGIN_VERSION,
			);

			add_option( 'polygon_plugin', $polygon_plugin );
		}



		// Get option values.
		$polygon_plugin = get_option( 'polygon_plugin' );



		// Set option values on every plugin activation.
		// $polygon_plugin['key-id'] = 'value';



		// Update option values.
		update_option( 'polygon_plugin', $polygon_plugin );
	}
}
