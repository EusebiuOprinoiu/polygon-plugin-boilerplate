<?php

// Remove all options on uninstall




// Exit if uninstall not called from WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}




// Remove plugin options
delete_option( 'polygon_plugin' );
delete_option( 'external_updates-polygon-plugin' );