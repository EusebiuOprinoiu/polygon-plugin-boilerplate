<?php

/**
 * Remove all options on uninstall
 *
 * Remove all plugin options, user meta and database tables when the plugin
 * is uninstalled. 
 *
 * @since      1.0.0
 * @package    Polygon_Plugin
 */




/**
 * Exit if uninstall not called from WordPress
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}




/**
 * Remove plugin options
 */
delete_option( 'polygon_plugin' );
delete_option( 'external_updates-polygon-plugin' );