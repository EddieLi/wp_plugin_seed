<?php
/*
    Plugin Name: My Plugin
    Plugin URI: http://eddieli.me
    Description: Seed Repo for any wordpress plguin
    Author: Eddie Li
    Version: 0.0.1
    Author URI: http://eddieli.me
*/

require('mpwp_plugin_settings_page.php');

class mpwp_Auth {
    function __construct() {
        remove_action("admin_notices", array( $this, 'mpwp_success_message'));
        remove_action("admin_notices", array( $this, 'mpwp_error_message'));
        add_action( 'admin_menu', array( $this, 'mpwp_menu' ) );
    }

    function mpwp_show_success_message(){
        remove_action("admin_notices", array( $this, 'mpwp_success_message'));
        add_action("admin_notices", array( $this, 'mpwp_error_message'));
    }

    function mpwp_success_message(){
        ?>
        <div class="notice notice-success is-dismissible">
            <p>Works</p>
        </div>
        <?php
    }

    function mpwp_error_message(){
        ?>
        <div class="notice notice-error is-dismissible">
            <p>Not working</p>
        </div>
        <?php
    }

    function mpwp_menu() {
        add_menu_page(  __("mpwp Authentication", 'textdomain'), 
                        "mpwp_Auth",
                        'administrator',
                         'mpwp_plugin_settings', 
                         array( $this, 'mpwp_widget_options'),
                         'dashicons-smartphone');        
	}

    function mpwp_widget_options(){
        mpwp_plugin_settings();
    }
}
new mpwp_Auth;

?>