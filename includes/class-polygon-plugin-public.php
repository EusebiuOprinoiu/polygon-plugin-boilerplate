<?php

// The public-facing functionality of the plugin




class Polygon_Plugin_Public {

	// The ID of this plugin
	private $plugin_name;

	// The version of this plugin
	private $version;




	// Initialize the class and set its properties
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}




	// Register stylesheets for the frontend
	public function enqueue_styles() {
		// Enqueue styles
	}




	// Register javascript for the frontend
	public function enqueue_scripts() {
		// Enqueue scripts
	}

}
