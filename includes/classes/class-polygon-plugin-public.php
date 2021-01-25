<?php
/**
 * Do things on the frontend
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */

defined( 'ABSPATH' ) || exit;





/**
 * Do things on the frontend.
 *
 * This class is used to maintain the functionality for the public-facing side
 * of our website.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Public {

	/**
	 * Actions and filters.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}





	/**
	 * Register and enqueue stylesheets for the frontend.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {
		// Enqueue frontend styles.
	}





	/**
	 * Register and enqueue javascript for the frontend.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		// Enqueue frontend scripts.
	}
}
