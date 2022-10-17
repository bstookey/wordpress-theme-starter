<?php

/**
 * Functions
 *
 * Adds custom functions to the WordPress install
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('STARTER_THEME_VERSION', '1.0');

/*******************************
  Init Functions
 ********************************/

function theme_init()
{
    // Additional content type attrubutes
    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'page-attributes');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    remove_filter('the_content', 'wpautop');
}
theme_init();

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
    wp_enqueue_style('admin_css', get_stylesheet_directory_uri() . '/assets/css/wp-admin.css', array(), STARTER_THEME_VERSION, false);
}
add_action('admin_enqueue_scripts', 'load_admin_style');

/*******************************
  Enqueue Scripts
 ********************************/
function starter_enqueue_scripts()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), STARTER_THEME_VERSION, false);
    }
}
add_action('wp_enqueue_scripts', 'starter_enqueue_scripts');

/**
 * Dynamic copyright year creation
 *
 * @param string  $year
 */
function auto_copyright($year = 'auto')
{
    $output = '';
    $now = intval(date('Y'));

    if (intval($year) == 'auto' || (intval($year) >= $now)) {
        $output = $now;
    } else if (intval($year) < $now) {
        $output = sprintf('%s - %s', intval($year), date('Y'));
    }

    return esc_html($output);
}
