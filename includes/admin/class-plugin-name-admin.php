<?php

// The admin-specific functionality of the plugin




class Plugin_Name_Admin {

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
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
	}




	// Register javascript for the admin area
	public function enqueue_scripts() {
		// Enqueue scripts
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
	}

}