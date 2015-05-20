<?php

// The public-facing functionality of the plugin




class Polygon_Plugin_Public {

	// Variables
	private $plugin_name; // Unique plugin name
	private $version;     // Current plugin version




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
