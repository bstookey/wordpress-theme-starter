<?php

/**
 * Customizer sections.
 *
 * @package Astrolab
 */

/**
 * Register the section sections.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 */

function astrolab_master_customize_sections($wp_customize)
{
	// Register a header section.
	$wp_customize->add_section(
		'astrolab_master_announcement_section',
		array(
			'title'    => esc_html__('Site Announcement', THEME_DOMAIN),
			'priority' => 10,
			'panel'    => 'site-options',
		)
	);

	// Register a header section.
	$wp_customize->add_section(
		'astrolab_master_header_section',
		array(
			'title'    => esc_html__('Header Customizations', THEME_DOMAIN),
			'priority' => 20,
			'panel'    => 'site-options',
		)
	);

	// Register a footer section.
	$wp_customize->add_section(
		'astrolab_master_footer_section',
		array(
			'title'    => esc_html__('Footer Customizations', THEME_DOMAIN),
			'priority' => 30,
			'panel'    => 'site-options',
		)
	);

	// Register a social links section. 
	$wp_customize->add_section(
		'astrolab_master_social_links_section',
		array(
			'title'       => esc_html__('Social Media', THEME_DOMAIN),
			'description' => esc_html__('Links here power the display_social_network_links() template tag. Enter the url', THEME_DOMAIN),
			'priority'    => 40,
			'panel'       => 'site-options',
		)
	);

	// Register deafult Images.
	$wp_customize->add_section(
		'astrolab_master_default_image_section',
		array(
			'title'    => esc_html__('Default Images', THEME_DOMAIN),
			'priority' => 50,
			'panel'    => 'site-options',
		)
	);

	// Register additional scripts section.
	$wp_customize->add_section(
		'astrolab_master_additional_scripts_section',
		array(
			'title'    => esc_html__('Additional Scripts', THEME_DOMAIN),
			'priority' => 100,
			'panel'    => 'site-options',
		)
	);
}
add_action('customize_register', 'astrolab_master_customize_sections');
