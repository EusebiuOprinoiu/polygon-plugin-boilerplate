<?php

// The admin-specific functionality of the plugin




class Polygon_Plugin_Admin {

	// The ID of this plugin
	private $plugin_name;

	// The version of this plugin
	private $version;




	// Initialize the class and set its properties
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}




	// Register stylesheets for the admin area
	public function enqueue_styles() {
		// Enqueue styles
	}




	// Register javascript for the admin area
	public function enqueue_scripts() {
		// Enqueue scripts
	}




	// Enable automatic updates
	public function load_update_checker() {
		include_once( POLYGON_PLUGIN_DIR_PATH . 'includes/third-party/update-checker/plugin-update-checker.php' );
		$update_checker = PucFactory::buildUpdateChecker( 
			'https://polygonthemes.com/update-server/?action=get_metadata&slug=polygon-plugin',
			POLYGON_PLUGIN_MAIN_FILE, 
			'polygon-plugin' 
		);
	}

}