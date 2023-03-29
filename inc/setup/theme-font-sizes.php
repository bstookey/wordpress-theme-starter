<?php

// Gutenberg defaults for font sizes.
add_theme_support(
    'editor-font-sizes',
    [
        // Comment out all to disable font sizes. Or use theme.json
        [
            'name' => __('Small', THEME_DOMAIN),
            'size' => 1.2,
            'slug' => 'small',
        ],
        [
            'name' => __('Base', THEME_DOMAIN),
            'size' => 1.6, // make sure this matches the font size in Global Variables
            'slug' => 'normal',
        ],
        [
            'name' => __('H2', THEME_DOMAIN),
            'size' => 3.6,
            'slug' => 'large',
        ],
        [
            'name' => __('H1', THEME_DOMAIN),
            'size' => 5,
            'slug' => 'huge',
        ],

    ]
);
