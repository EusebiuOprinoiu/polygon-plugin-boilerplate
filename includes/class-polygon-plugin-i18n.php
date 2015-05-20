<?php

// Define the internationalization functionality




class Polygon_Plugin_i18n {

	// Variables
	private $plugin_name; // Unique plugin name
	private $domain;      // Active text-domain




	// Initialize the class and set its properties
	public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
		$this->domain      = $plugin_name;
	}




	// Load plugin text-domain
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), $this->domain );

		// wp-content/languages/plugins/polygon-plugin/polygon-plugin-en_US.mo
		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . 'plugins/' . $this->plugin_name . '/' . $this->plugin_name . '-' . $locale . '.mo' );

		// wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
		load_plugin_textdomain( $this->domain, false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}

}