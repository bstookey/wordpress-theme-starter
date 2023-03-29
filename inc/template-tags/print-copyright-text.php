<?php

/**
 * Echo the copyright text saved in the Customizer.
 *
 * @package Astrolab
 */



/**
 * Echo the copyright text saved in the Customizer.
 *
 *
 */
function print_copyright_text()
{
	// Grab our customizer settings.
	$copyright_text = get_theme_mod('ip_copyright_text');

	if ($copyright_text) {
		echo get_post_content(do_shortcode($copyright_text)); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	}
}
