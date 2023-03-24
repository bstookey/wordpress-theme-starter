<?php

/**
 * Register Block Styles
 * 
 * See src > js directory for block-styles.js
 *
 * @package IP
 */

if (function_exists('register_block_style')) {
    register_block_style(
        'core/group',

        array(
            'name'         => 'default',
            'label'        => __('Full Width', THEME_DOMAIN),
            'is_default'   => true,
        ),
    );

    register_block_style(
        'core/group',

        array(
            'name'         => 'container',
            'label'        => __('Site Width', THEME_DOMAIN),
        ),
    );
    register_block_style(
        'core/group',
        array(
            'name'         => 'container-xs',
            'label'        => __('XS (700)', THEME_DOMAIN),
        ),
    );
    register_block_style(
        'core/group',
        array(
            'name'         => 'container-sm',
            'label'        => __('SM (900)', THEME_DOMAIN),
        ),
    );
    register_block_style(
        'core/group',
        array(
            'name'         => 'container-lg',
            'label'        => __('LG (1400)', THEME_DOMAIN),
        )

    );
}
