<?php

/**
 * Disables Gutenburg style in header. 
 * Note: Some of the custom configuration in the theme.json file could be lost.
 * Some attributes configured in theme.json could be used in the theme stylesheet.
 *
 * @package Astrolab
 */

function wps_deregister_styles()
{
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'wps_deregister_styles', 100);
