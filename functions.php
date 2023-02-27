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

    function include_inc_files()
    {
        $files = [
            'inc/customizer/customizer.php', // Customizer additions.
            'inc/theme-options/cust-options.php', // Theme options for address, alert, etc.
            'inc/functions/', // Custom functions that are independent of the theme templates.
            'inc/hooks/', // Load custom filters and hooks.
            'inc/post-types/', // Load custom post types.
            'inc/setup/', // Theme setup.
            'inc/template-tags/', // Custom template tags for this theme.
            'inc/ACF/', // Custom template tags for this theme.
            'inc/WOO/',
            'inc/menu/',
        ];

        foreach ($files as $include) {
            $include = trailingslashit(get_template_directory()) . $include;

            // Allows inclusion of individual files or all .php files in a directory.
            if (is_dir($include)) {
                foreach (glob($include . '*.php') as $file) {
                    require $file;
                }
            } else {
                require $include;
            }
        }
    }

    include_inc_files();

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
        wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), STARTER_THEME_VERSION, false);
        wp_enqueue_script('theme-custom', get_stylesheet_directory_uri() . '/assets/js/starter.js', array(), STARTER_THEME_VERSION, false);
    }
}
add_action('wp_enqueue_scripts', 'starter_enqueue_scripts');

/**
 * Add SVG definitions to footer.
 *
 * @author WDS
 */
function ip_master_include_svg_icons()
{

    // Define SVG sprite file.
    $svg_icons = get_template_directory() . 'assts/images/icons';

    // If it exists, include it.
    if (file_exists($svg_icons)) {
        require_once $svg_icons;
    }
}
add_action('wp_footer', 'ip_master_include_svg_icons', 9999);
