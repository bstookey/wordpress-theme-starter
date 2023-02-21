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
    // Customizer
    require(__DIR__ . '/inc/customizer/customizer.php');
    // SVG Support
    require(__DIR__ . '/inc/svg-support.php');
    // Copyright
    require(__DIR__ . '/inc/copyright.php');
    // REMOVE WP EMOJI
    require_once(__DIR__ . '/inc/disable-emojis.php');
    // Custom Post Types
    require_once(__DIR__ . '/inc/custom-post-types/cpt-models.php');
    // Menus
    require_once(__DIR__ . '/inc/menus.php');
    // Sidebars
    require_once(__DIR__ . '/inc/sidebars.php');
    // Image Sizes
    require_once(__DIR__ . '/inc/image-sizes.php');
    // Theme Colors
    require_once(__DIR__ . '/inc/theme-colors.php');
    // WooCommerce
    require_once(__DIR__ . '/inc/woo-commerce.php');
    // ACF Custom Blocks
    require_once(__DIR__ . '/inc/ACF/ACF_custom-blocks.php');



    // Additional content type attrubutes
    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'page-attributes');
    add_theme_support('title-tag');
    // 
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
        wp_enqueue_script('theme-custom', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), STARTER_THEME_VERSION, false);
    }
}
add_action('wp_enqueue_scripts', 'starter_enqueue_scripts');
