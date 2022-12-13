<?php
/**
 * Astra Child rillesfirst Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra Child rillesfirst
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ASTRA_CHILD_RILLESFIRST_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'astra-child-rillesfirst-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ASTRA_CHILD_RILLESFIRST_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// Remove dashboard widgets -------------------------- =>
function wpsh_remove_dashboard_widgets() {

	remove_meta_box( 'dashboard_primary','dashboard','side' ); // WordPress.com Blog
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); // Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); // Right Now
	remove_action( 'welcome_panel','wp_welcome_panel' ); // Welcome Panel
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg
	remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
	remove_meta_box('dashboard_recent_drafts','dashboard','side'); // Recent Drafts
	remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
	remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box('rg_forms_dashboard','dashboard','normal'); // Gravity Forms
	remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
	remove_meta_box('icl_dashboard_widget','dashboard','normal'); // Multi Language Plugin
	remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
}
add_action( 'wp_dashboard_setup', 'wpsh_remove_dashboard_widgets' );

// Remove Elementor Overview widget
function disable_elementor_dashboard_overview_widget() {
	remove_meta_box( 'e-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'disable_elementor_dashboard_overview_widget', 40);

// remove WooCommerce Dashboard Status widgets
function remove_dashboard_widgets(){
remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');    
}
add_action('wp_user_dashboard_setup', 'remove_dashboard_widgets', 20);
add_action('wp_dashboard_setup', 'remove_dashboard_widgets', 20);

// Remove Site Health from the Dashboard
add_action(
    'wp_dashboard_setup',
    function () {
        global $wp_meta_boxes;
        unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
    }
 );
