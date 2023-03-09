<?php

/**
 * Disables Gutenburg style in header.
 *
 * @package fs_dev
 */

function wps_deregister_styles()
{
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'wps_deregister_styles', 100);
