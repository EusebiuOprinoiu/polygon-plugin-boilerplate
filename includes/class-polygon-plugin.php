<?php

// The file that defines the core plugin class




class Polygon_Plugin {

	// String responsible for maintaining and registering hooks
	protected $loader;

	// String used to uniquely identify the plugin
	protected $plugin_name;

	// Current version of the plugin
	protected $version;




	// Define the core functionality of the plugin
	public function __construct() {
		$this->plugin_name = POLYGON_PLUGIN_PLUGIN_NAME;
		$this->version     = POLYGON_PLUGIN_VERSION;		

		$this->load_dependencies();
		$this->set_locale();
		$this->define_hooks();
	}




	// Load the required dependencies for the plugin
	private function load_dependencies() {
		// Class responsible for orchestrating the actions and filters of the core plugin
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-loader.php' );

		// Class responsible for defining internationalization functionality of the plugin
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-i18n.php' );

		// Class responsible for defining all actions that occur in the admin area
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-admin.php' );

		// Class responsible for defining all actions that occur in the frontend
		require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/class-polygon-plugin-public.php' );

		$this->loader = new Polygon_Plugin_Loader();
	}




	// Define locale for internationalization
	private function set_locale() {
		$plugin_i18n = new Polygon_Plugin_i18n();
		$plugin_i18n->set_domain( $this->get_polygon_plugin() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}




	// Register hooks for our plugin
	private function define_hooks() {
		// Create objects from classes
		$plugin_admin  = new Polygon_Plugin_Admin( $this->get_polygon_plugin(), $this->get_version() );
		$plugin_public = new Polygon_Plugin_Public( $this->get_polygon_plugin(), $this->get_version() );

		// Register admin hooks
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'after_setup_theme', $plugin_admin, 'load_update_checker' );

		// Register public hooks
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	


	// Run the loader and execute all hooks
	public function run() {
		$this->loader->run();
	}




	// Retreive plugin name (slug)
	public function get_polygon_plugin() {
		return $this->plugin_name;
	}

	


	// Retreive the plugin loader
	public function get_loader() {
		return $this->loader;
	}




	// Retreive the plugin version
	public function get_version() {
		return $this->version;
	}

}