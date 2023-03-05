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

define('THEME_DOMAIN', 'ip_master');

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
            //'inc/WOO/', // Custom functions/actions for Woocommerce.
            'inc/menu/', // Custom menus for this theme.
            'inc/ip-patterns/block-patterns.php', // Custom patterns for this theme.
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
}

theme_init();
