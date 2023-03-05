<?php

/**
 * Get the theme colors for this project. Set these first in the Global variables partial then migrate them over here.
 *
 * @return array The array of our color names and hex values.
 * 
 */

function get_theme_colors()
{
    return array(
        esc_html__('IP Red', THEME_DOMAIN)  => '#d31020',
        esc_html__('Black', THEME_DOMAIN)   => '#000',
        esc_html__('White', THEME_DOMAIN)   => '#FFF',
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
