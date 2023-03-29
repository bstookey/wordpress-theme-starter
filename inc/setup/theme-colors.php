<?php

/**
 * Get the theme colors for this project in src > scss > global > variables.
 * Copy the colors into inc > helper_functions.php
 * 
 * @return array The array of our color names and hex values.
 * 
 */

function ip_master_get_theme_colors_gutenberg()
{

    // Grab our theme colors from the inc > helper_functions.
    $colors = ip_master_get_theme_colors();
    //print_r($colors);

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
add_theme_support('editor-color-palette', ip_master_get_theme_colors_gutenberg());
