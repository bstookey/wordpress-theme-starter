<?php

/**
 * Display the customizer footer scripts.
 *
 * @package Wordpress
 *
 * @return string Footer scripts.
 * 
 * 
 * These are injected into the get_footer() and this tag does not need to be manually added to the footer.php file.
 * 
 */

function astrolab_master_print_customizer_footer_scripts()
{
	// Check for footer scripts.
	$scripts = get_theme_mod('astrolab_master_footer_scripts');

	// None? Bail...
	if (!$scripts) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo get_post_content($scripts);
}

add_action('wp_footer', 'astrolab_master_print_customizer_footer_scripts', 999);
