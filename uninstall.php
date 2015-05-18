<?php

// Remove all options on uninstall and flush rewrite rules




// Exit if uninstall not called from WordPress
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}




// Flush rewrite rules
flush_rewrite_rules();