<?php

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @package IP
 */

function content_width()
{
	$GLOBALS['content_width'] = apply_filters('IP_content_width', 640);
}

add_action('after_setup_theme', 'content_width', 0);
