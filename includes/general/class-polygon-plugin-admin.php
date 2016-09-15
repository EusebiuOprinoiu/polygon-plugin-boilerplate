<?php
/**
 * The file that contains the class for the admin functionality
 *
 * @since   1.0.0
 * @package Polygon_Plugin
 */





/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name and version, enqueue stylesheets and javascript for the admin area
 * and migrate options on plugin updates.
 *
 * @since 1.0.0
 */
class Polygon_Plugin_Admin {

	/**
	 * The unique identifier of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	private $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	private $version;





	/**
	 * Initialize the class and set its properties.
	 *
	 * Make the plugin name and the plugin version from the main plugin class available
	 * for the current class.
	 *
	 * @since 1.0.0
	 * @param string $plugin_name The unique identifier of the plugin.
	 * @param string $version     The current version of the plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}





	/**
	 * Register stylesheets for the admin area.
	 *
	 * Register and enqueue stylesheets for the admin area of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {
		// Enqueue styles.
	}





	/**
	 * Register javascript for the admin area.
	 *
	 * Register and enqueue javascript for the admin area of the site.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {
		// Enqueue scripts.
	}





	/**
	 * Migrate and update options on plugin updates.
	 *
	 * Compare the current plugin version with the one stored in the options table
	 * and migrate recursively if needed after a plugin update. The migration code for each
	 * version is stored in individual files and it's triggered only if the 'last-updated-version'
	 * parameter is older than versions where changes have been made.
	 *
	 * @since 1.0.0
	 */
	public function maybe_update() {
		$polygon_plugin = get_option( 'polygon_plugin' );

		if ( version_compare( $this->version, $polygon_plugin['plugin-version'] ) > 0 ) {
			/*
			// Migrate options to version 1.1.0.
			if ( version_compare( $polygon_plugin['last-updated-version'], '1.1.0' ) < 0 ) {
				require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/partials/migrate-to-version-1.1.0.php' );
				$polygon_plugin['last-updated-version'] = '1.1.0';
			}

			// Migrate options to version 1.2.0.
			if ( version_compare( $polygon_plugin['last-updated-version'], '1.2.0' ) < 0 ) {
				require_once( POLYGON_PLUGIN_DIR_PATH . 'includes/general/partials/migrate-to-version-1.2.0.php' );
				$polygon_plugin['last-updated-version'] = '1.2.0';
			}
			*/



			// Update plugin version.
			$polygon_plugin['plugin-version'] = $this->version;

			// Update plugin options.
			update_option( 'polygon_plugin', $polygon_plugin );
		}
	}
}
