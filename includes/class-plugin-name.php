<?php

// The file that defines the core plugin class




class Plugin_Name {

	// String responsible for maintaining and registering hooks
	protected $loader;

	// String used to uniquely identify the plugin
	protected $plugin_name;

	// Current version of the plugin
	protected $version;




	// Define the core functionality of the plugin
	public function __construct() {

		$this->plugin_name = PLUGIN_NAME_PLUGIN_NAME;
		$this->version     = PLUGIN_NAME_VERSION;		

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}




	// Load the required dependencies for the plugin
	private function load_dependencies() {
		// Class responsible for orchestrating the actions and filters of the core plugin
		require_once( PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-loader.php' );

		// Class responsible for defining internationalization functionality of the plugin
		require_once( PLUGIN_NAME_DIR_PATH . 'includes/class-plugin-name-i18n.php' );

		// Class responsible for defining all actions that occur in the admin area
		require_once( PLUGIN_NAME_DIR_PATH . 'includes/admin/class-plugin-name-admin.php' );

		// Class responsible for defining all actions that occur in the frontend
		require_once( PLUGIN_NAME_DIR_PATH . 'includes/public/class-plugin-name-public.php' );

		$this->loader = new Plugin_Name_Loader();
	}




	// Define locale for internationalization
	private function set_locale() {
		$plugin_i18n = new Plugin_Name_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}




	// Register hooks for the admin area functionality
	private function define_admin_hooks() {
		$plugin_admin = new Plugin_Name_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}




	// Register hooks for the public-facing functionality
	private function define_public_hooks() {
		$plugin_public = new Plugin_Name_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	


	// Run the loader and execute all hooks
	public function run() {
		$this->loader->run();
	}




	// Retreive plugin name (slug)
	public function get_plugin_name() {
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