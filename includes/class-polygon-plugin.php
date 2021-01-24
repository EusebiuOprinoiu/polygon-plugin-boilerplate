<?php
/**
 * The core plugin class
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





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
	 * we previously registered inside the function define_hooks().
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->load_dependencies();
		$this->load_textdomain();
		$this->load_hooks();
	}





	/**
	 * Load required dependencies.
	 *
	 * Load the files required to create our plugin.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function load_dependencies() {
		require_once POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-textdomain.php';
		require_once POLYGON_PLUGIN_DIR_PATH . 'includes/general/class-polygon-plugin-admin.php';
		require_once POLYGON_PLUGIN_DIR_PATH . 'includes/general/class-polygon-plugin-public.php';
		require_once POLYGON_PLUGIN_DIR_PATH . 'includes/general/class-polygon-plugin-updates.php';
	}





	/**
	 * Load plugin text-domain.
	 *
	 * Uses the Polygon_Plugin_Textdomain class in order to set the text-domain and define
	 * the location of our translation files.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function load_textdomain() {
		$textdomain = new Polygon_Plugin_Textdomain();
		$textdomain->init();
	}





	/**
	 * Register hooks with WordPress.
	 *
	 * Create objects from classes and register all hooks with WordPress.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function load_hooks() {
		$admin = new Polygon_Plugin_Admin();
		$admin->init();

		$public = new Polygon_Plugin_Public();
		$public->init();

		$updates = new Polygon_Plugin_Updates();
		$updates->init();
	}
}
