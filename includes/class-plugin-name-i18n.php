<?php

// Define the internationalization functionality




class Plugin_Name_i18n {

	// Domain specified for the plugin
	private $domain;




	// Load the plugin text domain
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), $this->domain );

		// wp-content/languages/plugins/plugin-name/plugin-name-en_US.mo
		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . 'plugins/' . PLUGIN_NAME_PLUGIN_NAME . '/' . PLUGIN_NAME_PLUGIN_NAME . '-' . $locale . '.mo' );

		// wp-content/plugins/plugin-name/languages/plugin-name-en_US.mo
		load_plugin_textdomain( $this->domain, false, plugin_basename( PLUGIN_NAME_DIR_PATH ) . '/languages/' );
	}




	// Set the domain equal to that of the specified domain
	public function set_domain( $domain ) {
		$this->domain = $domain;
	}

}
