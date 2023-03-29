<?php

/**
 * Display the customizer header scripts.
 *
 * @package IP
 *
 * @return string Header scripts.
 */

function ip_master_print_customizer_body_scripts()
{
	// Check for header scripts.
	$scripts = get_theme_mod('ip_master_body_scripts');

	// None? Bail...
	if (!$scripts) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo get_post_content($scripts);
}

add_action('wp_head', 'ip_master_print_customizer_body_scripts', 999);
