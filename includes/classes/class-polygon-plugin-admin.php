<?php
/**
 * Do things in the admin area
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */

defined( 'ABSPATH' ) || exit;





/**
 * Do things in the admin area.
 *
 * This class is used to maintain the functionality for the admin-facing side
 * of our website.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Admin {

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}





	/**
	 * Register and enqueue stylesheets for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook Hook name for the current admin page.
	 */
	public function enqueue_styles( $hook ) {
		// Enqueue admin styles.
	}





	/**
	 * Register and enqueue javascript for the admin area.
	 *
	 * @since 1.0.0
	 * @param string $hook Hook name for the current admin page.
	 */
	public function enqueue_scripts( $hook ) {
		// Enqueue admin scripts.
	}
}
