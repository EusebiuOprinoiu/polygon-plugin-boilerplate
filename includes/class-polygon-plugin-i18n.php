<?php

/**
 * The file that defines the class for our plugin internationalization
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Polygon_Plugin
 */




/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since    1.0.0
 */
class Polygon_Plugin_i18n {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $plugin_name;



	/**
	 * The active plugin text-domain.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string
	 */
	private $domain;




	/**
	 * Initialize the class and set its properties.
	 *
	 * Make the plugin name and the plugin version from the main plugin class available
	 * inside this class.
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
		$this->domain      = $plugin_name;
	}




	/**
	 * Load plugin text-domain.
	 *
	 * Load the plugin text-domain for translation from:
	 *
	 * - Global languages folder: wp-content/languages/plugins/polygon-plugin/polygon-plugin-en_US.mo
	 * - Local languages folder: wp-content/plugins/polygon-plugin/languages/polygon-plugin-en_US.mo
	 *
	 * If no files are found in the global languages folder the plugin uses the files available in the
	 * local folder.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'locale', get_locale(), $this->domain );

		// Load textdomain from the global languages folder
		load_textdomain( $this->domain, trailingslashit( WP_LANG_DIR ) . 'plugins/' . $this->plugin_name . '/' . $this->plugin_name . '-' . $locale . '.mo' );

		// Load textdomain from the local languages folder
		load_plugin_textdomain( $this->domain, false, plugin_basename( POLYGON_PLUGIN_DIR_PATH ) . '/languages/' );
	}

}