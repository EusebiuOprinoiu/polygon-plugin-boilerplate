<?php

// Class fired during plugin activation




class Polygon_Plugin_Activator {

	// Do stuff on plugin activation
	public static function activate() {
		// Create plugin options if not available
		if ( ! get_option( 'polygon_plugin' ) ) {
			$polygon_plugin = array();
			add_option( 'polygon_plugin', $polygon_plugin );
		}



		// Add default values for options
		$polygon_plugin = get_option( 'polygon_plugin' );

		if ( ! isset( $polygon_plugin['plugin-version'] ) ) {
			$polygon_plugin['plugin-version'] = POLYGON_PLUGIN_VERSION;
		}

		if ( ! isset( $polygon_plugin['last-updated-version'] ) ) {
			$polygon_plugin['last-updated-version'] = POLYGON_PLUGIN_VERSION;
		}

		update_option( 'polygon_plugin', $polygon_plugin );



		// Do more stuff
	}

}