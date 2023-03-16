<?php

/**
 * Display the customizer header scripts.
 *
 * @package fs_dev
 *
 * @return string Header scripts.
 */

function print_customizer_header_scripts()
{
	// Check for header scripts.
	$scripts = get_theme_mod('fs_header_scripts');

	// None? Bail...
	if (!$scripts) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo get_post_content($scripts);
}

add_action('wp_head', 'print_customizer_header_scripts', 999);
