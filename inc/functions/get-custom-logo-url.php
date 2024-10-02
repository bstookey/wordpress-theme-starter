<?php

/**
 * Get cutom logo url.
 *
 * @package Wordpress
 *
 * @return string The logo url.
 */
function get_logo_url()
{
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        // Get the URL of the custom logo image
        $custom_logo_url = wp_get_attachment_image_src($custom_logo_id, 'full')[0];

        // Output the custom logo URL
        return $custom_logo_url;
    }
}
