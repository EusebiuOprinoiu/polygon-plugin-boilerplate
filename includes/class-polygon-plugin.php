<?php
/**
 * The core plugin class
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */

defined( 'ABSPATH' ) || exit;





/**
 * The core plugin class.
 *
 * This class is used to load all dependencies, prepare the plugin for translation
 * and register all actions and filters with WordPress.
 *
 * @since 1.0.0
 */
class Polygon_Plugin {

	/**
	 * Execute all hooks.
	 *
	 * Load dependencies, the plugin text-domain and execute all hooks
	 * we previously registered inside the function load_hooks().
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->includes();
		$this->init();
	}





	/**
	 * Load required dependencies.
	 *
	 * Load the files required to create our plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function includes() {
		require_once POLYGON_PLUGIN_DIR . 'includes/classes/class-polygon-plugin-admin.php';
		require_once POLYGON_PLUGIN_DIR . 'includes/classes/class-polygon-plugin-public.php';
		require_once POLYGON_PLUGIN_DIR . 'includes/classes/class-polygon-plugin-updates.php';
	}





	/**
	 * Register hooks with WordPress.
	 *
	 * Create objects from classes and register all hooks with WordPress.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function init() {
		$admin = new Polygon_Plugin_Admin();
		$admin->init();

		$public = new Polygon_Plugin_Public();
		$public->init();

		$updates = new Polygon_Plugin_Updates();
		$updates->init();
	}
}
