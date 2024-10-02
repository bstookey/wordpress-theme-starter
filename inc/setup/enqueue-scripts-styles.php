<?php

/**
 * Enqueue scripts and styles.
 *
 * @package Wordpress
 */

define('ASTROLAB_THEME_VERSION', '1.0');

// Enqueue Styles

function astrolab_enqueue_styles()
{
	if (!is_admin()) {
		wp_enqueue_style('astrolab-theme-styles', get_stylesheet_directory_uri() . '/assets/css/starter.css', array(), ASTROLAB_THEME_VERSION, false);
	}
}
add_action('wp_enqueue_scripts', 'astrolab_enqueue_styles', 100);

// Custom Admin Styles
function load_admin_style()
{
	if (is_admin()) {
		wp_enqueue_style('astrolab-admin-css', get_stylesheet_directory_uri() . '/assets/css/wp-admin.css', array(), ASTROLAB_THEME_VERSION, false);
	}
}
add_action('admin_enqueue_scripts', 'load_admin_style');

// Enqueue Scripts

function astrolab_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), ASTROLAB_THEME_VERSION, false);
		wp_enqueue_script('astrolab-theme-apps-js', get_stylesheet_directory_uri() . '/assets/js/apps.js', array(), ASTROLAB_THEME_VERSION, true);
		wp_enqueue_script('astrolab-theme-js', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), ASTROLAB_THEME_VERSION, true);
	}
}
add_action('wp_enqueue_scripts', 'astrolab_enqueue_scripts');
