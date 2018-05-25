<?php
/**
Plugin Name: Hide Menu Pages
Plugin URI: https://widerwebs.com
Description: Hide certain pages from the admin menu.
Version: 0.0.1
License: Private
*/

// Do not allow this file to be called directly.
if (!defined('ABSPATH')) { exit; }

function ww_remove_admin_menu_pages() {
	if (is_super_admin()) {
		return;
	}
	remove_menu_page('tools.php');
	remove_menu_page('themes.php');
	remove_menu_page('edit.php?post_type=project');
	remove_menu_page('wpseo_dashboard');
	remove_menu_page('theme_my_login');
	remove_menu_page('options-general.php');
	remove_menu_page('my-sites.php');
}
add_action('admin_menu', 'ww_remove_admin_menu_pages');

function ww_remove_wp_icon() {
	if (!is_super_admin()) {
		echo '<style>li#wp-admin-bar-wp-logo, li#wp-admin-bar-site-name { display: none; }</style>';
	}
}
add_action('admin_head', 'ww_remove_wp_icon');
