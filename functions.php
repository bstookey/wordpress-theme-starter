<?php

/**
 * Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IP
 * @package IP Theme
 * @since  1.0
 * 
 */


// display all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// change this to 'your_domain'
define('THEME_DOMAIN', 'fs_master');

// set up the path to your svg sprite declared in your webpack.mix.js file
define('ICON_PATH', '/assets/images/icons/sprite.svg#');


/*******************************
  Init Functions
 ********************************/

function theme_init()
{

    function include_inc_files()
    {
        $files = [
            'inc/helper_functions.php', // Globally used functions.
            'inc/customizer/customizer.php', // Customizer additions.
            'inc/theme-options/cust-options.php', // Theme options for address, alert, etc.
            'inc/functions/', // Custom functions that are independent of the theme templates.
            'inc/hooks/', // Load custom filters and hooks.
            'inc/post-types/', // Load custom post types.
            'inc/setup/', // Theme setup, menu, widgets, etc.
            'inc/template-tags/', // Custom template tags for this theme.
            'inc/ACF/', // Custom block setup.
            'inc/WOO/', // Custom functions/actions for Woocommerce.
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
