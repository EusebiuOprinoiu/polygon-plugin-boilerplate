<?php

/**
 * Remove all options on uninstall 
 *
 * @since      1.0.0
 * @package    Polygon_Plugin
 */





/**
 * Exit if uninstall not called from WordPress.
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}





/**
 * Remove plugin options.
 */
delete_option( 'polygon_plugin' );
delete_option( 'external_updates-polygon-plugin' );