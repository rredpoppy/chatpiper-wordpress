<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.chatpiper.com
 * @since             1.0.0
 * @package           Chatpiper_Wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       Chatpiper wordpress
 * Plugin URI:        https://www.chatpiper.com
 * Description:       A Wordpress plugin to assist in installing the ChatPiper chat app
 * Version:           1.0.0
 * Author:            WhiteCity Code
 * Author URI:        http://whitecitycode.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chatpiper-wordpress
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

register_activation_hook( __FILE__, function () {

});
register_deactivation_hook( __FILE__, function () {

});

add_action('admin_menu', function () {    
    add_options_page(
            'ChatPiper Settings',
            'ChatPiper',
            'manage_chatpiper',
            'chatpiper',
            function () {
                if ( !current_user_can( 'manage_chatpiper' ) )  {
                    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
                }
                
                if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['chatpiper_url']) ){
                    update_option( 'CHATPIPER_URL', $_POST['chatpiper_url'] );
                }
                // GET
                ?>
                <div class="chatpiper-form">
                    <h1>ChatPiper Url</h1>
                    <form name="options" method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <label for="chatpiper_url">ChatPiper Url<span class="required">(*)</span>: </label>
                        <input type="text" name="chatpiper_url" value="<?php echo get_option( 'CHATPIPER_URL', '' ); ?>" size="70">
                        <input class="button-primary" type="submit" name="save" />                    
                        <br/>
                        <small>You can sign up for ChatPiper <a href="https://www.chatpiper.com" target="_blank">here</a></small>                
                    </form>
                </div>
                <?php
            }
        );
});

add_action( 'wp_enqueue_scripts', function () {
    // add chatpiper script here
});
