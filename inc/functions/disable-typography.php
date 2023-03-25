<?php

add_action(
    'after_setup_theme',
    function () {
        add_theme_support('editor-font-sizes', []);
        add_filter(
            'block_editor_settings_all',
            function ($editor_settings, $context) {
                $editor_settings['__experimentalFeatures']['typography']['fontWeight'] = false;
                $editor_settings['__experimentalFeatures']['typography']['letterSpacing'] = false;
                $editor_settings['__experimentalFeatures']['typography']['textTransform'] = false;
                $editor_settings['__experimentalFeatures']['typography']['fontStyle'] = false;
                $editor_settings['__experimentalFeatures']['typography']['dropCap'] = false;
                return $editor_settings;
            },
            10,
            2
        );
    }
);
