<?php

// The public-facing functionality of the plugin




class Plugin_Name_Public {

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
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Enqueue styles
		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );
	}




	// Register javascript for the frontend
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Enqueue scripts
		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );
	}

}
