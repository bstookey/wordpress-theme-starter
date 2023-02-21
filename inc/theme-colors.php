<?php

/**
 * Get the theme colors for this project. Set these first in the Sass partial then migrate them over here.
 *
 * @return array The array of our color names and hex values.
 * 
 */

function get_theme_colors()
{
    return array(
        esc_html__('Primary', 'ip_master')        => '#0093ff',
        esc_html__('Secondary', 'ip_master')      => '#fced3c',
        esc_html__('Black', 'ip_master')          => '#393C45',
    );
}

/**
 * Copies our ACF color settings into an array readable by Gutenberg's color picker.
 *
 * @return array $gutenberg_colors The Gutenberg-ready array
 * 
 */
function get_theme_colors_gutenberg()
{

    // Grab our ACF theme colors.
    $colors = get_theme_colors();

    if (!$colors) {
        return array();
    }

    foreach ($colors as $key => $color) {
        $gutenberg_colors[] = array(
            'name'  => esc_html($key),
            'slug'  => sanitize_title($key),
            'color' => esc_attr($color),
        );
    }

    return $gutenberg_colors;
}

// Gutenberg color palette support.
add_theme_support('editor-color-palette', get_theme_colors_gutenberg());
