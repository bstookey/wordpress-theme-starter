<?php

/**
 * Enqueue scripts and styles.
 *
 * @package IP
 */

define('IP_THEME_VERSION', '1.0');

// Enqueue Styles

function ip_enqueue_styles()
{
	if (!is_admin()) {
		wp_enqueue_style('ip-theme-styles', get_stylesheet_directory_uri() . '/assets/css/starter.css', array(), IP_THEME_VERSION, false);
	}
}
add_action('wp_enqueue_scripts', 'ip_enqueue_styles', 100);

// Custom Admin Styles
function load_admin_style()
{
	if (is_admin()) {
		wp_enqueue_style('ip-admin-css', get_stylesheet_directory_uri() . '/assets/css/wp-admin.css', array(), IP_THEME_VERSION, false);
	}
}
add_action('admin_enqueue_scripts', 'load_admin_style');

// Enqueue Scripts

function ip_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), IP_THEME_VERSION, false);
		wp_enqueue_script('ip-theme-apps-js', get_stylesheet_directory_uri() . '/assets/js/apps.js', array(), IP_THEME_VERSION, true);
		wp_enqueue_script('ip-theme-js', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), IP_THEME_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'ip_enqueue_scripts');

/**
 * Dequeue WordPress core Block Library styles.
 *
 *
 */
function deregister_core_block_styles()
{
	// This will remove the inline styles for the following core blocks.
	$block_styles_to_remove = [
		'heading',
		'paragraph',
		'table',
		'list',
	];

	foreach ($block_styles_to_remove as $block_style) {
		wp_deregister_style('wp-block-' . $block_style);
	}
}
add_action('wp_enqueue_scripts', 'deregister_core_block_styles');
