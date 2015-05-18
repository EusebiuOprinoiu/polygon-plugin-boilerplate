<?php

// Define the internationalization functionality




class Polygon_Plugin_i18n {

	// Domain specified for the plugin
	private $domain;




	// Load the plugin text domain
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), $this->domain );

		// wp-content/languages/plugins/polygon-plugin/polygon-plugin-en_US.mo
		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . 'plugins/' . POLYGON_PLUGIN_PLUGIN_NAME . '/' . POLYGON_PLUGIN_PLUGIN_NAME . '-' . $locale . '.mo' );

		// wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
		load_plugin_textdomain( $this->domain, false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}




	// Set the domain equal to that of the specified domain
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}

}