<?php

// Class fired during plugin activation




class Polygon_Plugin_Activator {

	// Do stuff on plugin activation
	public static function activate() {
		// Create plugin options if not available
		if ( ! get_option( 'polygon_plugin' ) ) {
			$polygon_plugin = array(
				'plugin-version'       => POLYGON_PLUGIN_VERSION,
				'last-updated-version' => POLYGON_PLUGIN_VERSION,
			);

			add_option( 'polygon_plugin', $polygon_plugin );
		}



		// Get option values 
		$polygon_plugin = get_option( 'polygon_plugin' );



		// Set option values on every plugin activation
		// $polygon_plugin['key-id'] = 'value';



		// Update option values
		update_option( 'polygon_plugin', $polygon_plugin );
	}

}