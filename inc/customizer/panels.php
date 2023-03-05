<?php

/**
 * Customizer panels.
 *
 * @package IP
 */

function ip_master_customize_panels($wp_customize)
{

	// Register a new panel.
	$wp_customize->add_panel(
		'site-options',
		array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__('' . wp_get_theme()->get('Name') . ' Options', THEME_DOMAIN),
			'description'    => esc_html__('Other theme options.', THEME_DOMAIN),
		)
	);
}
add_action('customize_register', 'ip_master_customize_panels');
