<?php
/**
 * disable_editor_gradients.
 *
 * Disable gradient coors in the gutenberg editor.
 *
 * @see https://since1979.dev/snippet-011-custom-gutenberg-gradient-colors/
 *
 * @uses add_theme_support() https://developer.wordpress.org/reference/functions/add_theme_support/
 * @uses array() https://www.php.net/manual/en/function.array.php
 */
function disable_editor_gradients()
{
    add_theme_support('disable-custom-gradients');
    add_theme_support('editor-gradient-presets', array());
}

/**
 * Hook: after_setup_theme.
 *
 * @uses add_action() https://developer.wordpress.org/reference/functions/add_action/
 * @uses after_setup_theme https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
add_action('after_setup_theme', 'disable_editor_gradients');
