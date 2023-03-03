<?php

/**
 * Enqueue scripts and styles.
 *
 * @package IP
 */

/**
 * Enqueue scripts and styles.
 *
 * @author WebDevStudios
 */

/*******************************
  Enqueue Styles
 ********************************/
function starter_enqueue_styles()
{
	if (!is_admin()) {
		wp_enqueue_style('starter-styles', get_stylesheet_directory_uri() . '/assets/css/starter.css', array(), STARTER_THEME_VERSION, false);
	}
}
add_action('wp_enqueue_scripts', 'starter_enqueue_styles', 100);

// Custom Admin Styles
function load_admin_style()
{
	if (is_admin()) {
		wp_enqueue_style('admin_css', get_stylesheet_directory_uri() . '/assets/css/wp-admin.css', array(), STARTER_THEME_VERSION, false);
	}
}
add_action('admin_enqueue_scripts', 'load_admin_style');

/*******************************
  Enqueue Scripts
 ********************************/
function starter_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), STARTER_THEME_VERSION, false);
		wp_enqueue_script('theme-custom', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), STARTER_THEME_VERSION, false);
	}
}
add_action('wp_enqueue_scripts', 'starter_enqueue_scripts');

/**
 * Dequeue WordPress core Block Library styles.
 *
 * @author WebDevStudios
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
