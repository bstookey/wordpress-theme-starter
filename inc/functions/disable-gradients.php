<?php

/**
 * disable_editor_gradients.
 * 
 * @package Wordpress
 */

add_action('after_setup_theme', 'disable_editor_gradients');

function disable_editor_gradients()
{
    add_theme_support('disable-custom-gradients');
    add_theme_support('editor-gradient-presets', array());
}
