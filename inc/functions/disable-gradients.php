<?php

/**
 * disable_editor_gradients.
 * 
 * @package IP
 */

function disable_editor_gradients()
{
    add_theme_support('disable-custom-gradients');
    add_theme_support('editor-gradient-presets', array());
}

add_action('after_setup_theme', 'disable_editor_gradients');
