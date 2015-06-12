<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    Polygon_Plugin
 */





/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since    1.0.0
 */
class Polygon_Plugin {

	/**
	 * The loader responsible for maintaining and registering all hooks that power the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       object
	 */
	protected $loader;



	/**
	 * The unique identifier of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	protected $plugin_name;



	/**
	 * The current version of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	protected $version;





	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->plugin_name = 'polygon-plugin';
		$this->version     = POLYGON_PLUGIN_VERSION;		

		$this->load_dependencies();
		$this->set_locale();
		$this->define_hooks();
	}





	/**
	 * Load the required dependencies for the plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Polygon_Plugin_Loader - Orchestrates the hooks of the plugin.
	 * - Polygon_Plugin_i18n   - Defines internationalization functionality.
	 * - Polygon_Plugin_Admin  - Defines all hooks for the admin area.
	 * - Polygon_Plugin_Public - Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function load_dependencies() {
		// Class responsible for orchestrating the actions and filters of the core plugin
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-loader.php' );

		// Class responsible for defining internationalization functionality of the plugin
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-i18n.php' );

		// Class responsible for defining all actions that occur in the admin area
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/class-polygon-plugin-admin.php' );

		// Class responsible for defining all actions that occur in the frontend
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/class-polygon-plugin-public.php' );

		$this->loader = new Polygon_Plugin_Loader();
	}





	/**
	 * Define locale for internationalization.
	 *
	 * Uses the Polygon_Plugin_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function set_locale() {
		$plugin_i18n = new Polygon_Plugin_i18n( $this->get_plugin_name() );

		$this->loader->add_action( 'after_setup_theme', $plugin_i18n, 'load_plugin_textdomain' );
	}





	/**
	 * Register hooks for our plugin.
	 *
	 * Create the objects required for our plugin and register all hooks using the plugin loader.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function define_hooks() {
		// Create objects from classes
		$plugin_admin  = new Polygon_Plugin_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_public = new Polygon_Plugin_Public( $this->get_plugin_name(), $this->get_version() );

		// Register admin hooks
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'after_setup_theme', $plugin_admin, 'load_update_checker' );
		$this->loader->add_action( 'plugins_loaded', $plugin_admin, 'maybe_update' );

		// Register public hooks
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}





	/**
	 * Run loader and execute all hooks.
	 *
	 * Run the plugin loader and execute all hooks we previously registered inside the function define_hooks().
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}





	/**
	 * Retreive the plugin name.
	 *
	 * Retreive the unique identifier of our plugin (slug) and return it as a string.
	 *
	 * @since     1.0.0
	 * @return    string
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	



	/**
	 * Retreive the plugin loader.
	 *
	 * Retreive the object containing all hooks registered by our plugin.
	 *
	 * @since     1.0.0
	 * @return    object
	 */
	public function get_loader() {
		return $this->loader;
	}





	/**
	 * Retreive the plugin version.
	 *
	 * Retreive the version of our plugin and return it as a string.
	 *
	 * @since     1.0.0
	 * @return    string
	 */
	public function get_version() {
		return $this->version;
	}

}