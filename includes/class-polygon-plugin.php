<?php
/**
 * The file that contains the core plugin class
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * @since 1.0.0
 */
class Polygon_Plugin {

	/**
	 * Initialize the class and get things started.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Nothing yet.
	}





	/**
	 * Execute all hooks.
	 *
	 * Execute all hooks we previously registered inside the function define_hooks().
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->load_dependencies();
		$this->load_textdomain();
		$this->define_hooks();
	}





	/**
	 * Load the required dependencies.
	 *
	 * Load the files required to create our plugin.
	 * Create an instance of the loader which will be used to register the hooks with WordPress.
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
	 * Uses the Polygon_Plugin_Textdomain class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function load_textdomain() {
		$textdomain = new Polygon_Plugin_Textdomain();

		add_action( 'after_setup_theme', array( $textdomain, 'load_plugin_textdomain' ) );
	}





	/**
	 * Register hooks for our plugin.
	 *
	 * Create the objects required for our plugin and register all hooks using the plugin loader.
	 *
	 * @since  1.0.0
	 * @access private
	 */
	private function define_hooks() {
		$admin   = new Polygon_Plugin_Admin();
		$public  = new Polygon_Plugin_Public();
		$updates = new Polygon_Plugin_Updates();


		// Register admin hooks.
		add_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $admin, 'enqueue_scripts' ) );

		// Register public hooks.
		add_action( 'wp_enqueue_scripts', array( $public, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $public, 'enqueue_scripts' ) );

		// Register db update hooks.
		add_action( 'plugins_loaded', array( $updates, 'maybe_update' ) );
		add_action( 'wpmu_new_blog', array( $updates, 'maybe_activate' ), 10, 6 );
	}
}
