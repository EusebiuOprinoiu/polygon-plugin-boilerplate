<?php

// The admin-specific functionality of the plugin




class Polygon_Plugin_Admin {

	// Variables
	private $plugin_name; // Unique plugin name
	private $version;     // Current plugin version




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




	// Migrate and update options on plugin updates
	public function migrate_options_on_plugin_updates() {
		if ( is_admin() ) {
			$polygon_plugin = get_option( 'polygon_plugin' );

			if ( version_compare( $this->version, $polygon_plugin['plugin_version'] ) > 0 ) {
				/*
				// Migrate options to version 1.1.0
				if ( version_compare( $polygon_plugin['options_last_updated'], '0.5.0' ) < 0 ) {
					require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/partials/migrate-to-version-1.1.0.php' );
					$polygon_plugin['options_last_updated'] = '0.5.0';
				}

				// Migrate options to version 1.2.0
				if ( version_compare( $polygon_plugin['options_last_updated'], '1.0.0' ) < 0 ) {
					require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/partials/migrate-to-version-1.2.0.php' );
					$polygon_plugin['options_last_updated'] = '1.0.0';
				}
				*/



				// Update plugin version
				$polygon_plugin['plugin_version'] = $this->version;

				// Update plugin options
				update_option( 'polygon_plugin', $polygon_plugin );
			}
		}
	}

}