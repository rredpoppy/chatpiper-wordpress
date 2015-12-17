<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link              https://www.chatpiper.com
 * @since             1.0.0
 * @package           Chatpiper_Wordpress
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
 
$option_name = 'chatpiper_url';
 
delete_option( $option_name );
 
// For site options in Multisite
delete_site_option( $option_name );
