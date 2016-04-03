<?php
/**
 * The file that contains the class for the public-facing functionality
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name and version and enqueue stylesheets and javascript for the
 * frontend.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Public {

	/**
	 * The unique identifier of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	private $plugin_name;



	/**
	 * The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	private $version;





	/**
	 * Initialize the class and set its properties.
	 *
	 * Make the plugin name and the plugin version from the main plugin class available
	 * for the current class.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The unique identifier of the plugin.
	 * @param string $version     The current version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}





	/**
	 * Register stylesheets for the frontend.
	 *
	 * Register and enqueue stylesheets for the frontend area of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {
		// Enqueue styles.
	}





	/**
	 * Register javascript for the frontend.
	 *
	 * Register and enqueue javascript for the frontend area of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		// Enqueue scripts.
	}
}
