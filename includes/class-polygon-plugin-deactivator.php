<?php
/**
 * Fired during plugin deactivation
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * Fired during plugin deactivation.
 *
 * This class defines all the code that runs during the plugin deactivation.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Deactivator {

	/**
	 * Run deactivation script.
	 *
	 * Run the deactivation script for the current site if we are on a standard
	 * WordPress install, or for all sites if we are on WordPress Multisite
	 * and the plugin is network activated.
	 *
	 * @since 1.0.0
	 * @param bool $network_wide Boolean value with the network-wide activation status.
	 */
	public static function deactivate( $network_wide = false ) {
		if ( is_multisite() ) {
			if ( $network_wide ) {
				global $wpdb;

				// phpcs:ignore
				$blogs = $wpdb->get_results( "SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A );

				if ( $blogs ) {
					foreach ( $blogs as $blog ) {
						switch_to_blog( $blog['blog_id'] );

						self::run_deactivation_script();
					}
					restore_current_blog();
				}
			} else {
				self::run_deactivation_script();
			}
		} else {
			self::run_deactivation_script();
		}
	}





	/**
	 * Do stuff on plugin deactivation.
	 *
	 * Long description goes here.
	 *
	 * @since 1.0.0
	 */
	public static function run_deactivation_script() {
		// Do something.
	}
}
