<?php

/**
 * Customizer settings.
 *
 * @package IP
 */

/**
 * Register additional scripts.
 *
 * @param object $wp_customize Instance of WP_Customize_Class.
 * @author WDS
 */
function ip_master_customize_additional_scripts($wp_customize)
{

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_header_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_header_scripts',
		array(
			'label'       => esc_html__('Header Scripts', 'ip_master'),
			'description' => esc_html__('Additional scripts to add to the header. Basic HTML tags are allowed.', 'ip_master'),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_body_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_body_scripts',
		array(
			'label'       => esc_html__('Body Scripts', 'ip_master'),
			'description' => esc_html__('Additional scripts to add to after the <body>. Basic HTML tags are allowed.', 'ip_master'),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_footer_scripts',
		array(
			'default'           => '',
			'sanitize_callback' => 'force_balance_tags',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_footer_scripts',
		array(
			'label'       => esc_html__('Footer Scripts', 'ip_master'),
			'description' => esc_html__('Additional scripts to add to the footer. Basic HTML tags are allowed.', 'ip_master'),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);
}
add_action('customize_register', 'ip_master_customize_additional_scripts');

/**
 * Register a social icons setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_social_icons($wp_customize)
{

	// Create an array of our social links for ease of setup.
	$social_networks = array('Facebook', 'instagram', 'LinkedIn', 'twitter', 'YouTube');

	// Loop through our networks to setup our fields.
	foreach ($social_networks as $network) {

		// Register a setting.
		$wp_customize->add_setting(
			'IP_' . sanitize_key($network) . '_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url',
			)
		);

		// Create the setting field.
		$wp_customize->add_control(
			'IP_' . sanitize_key($network) . '_link',
			array(
				'label'   => /* translators: the social network name. */ sprintf(esc_html__('%s URL', 'ip_master'), ucwords($network)),
				'section' => 'ip_master_social_links_section',
				'type'    => 'text',
			)
		);
	}
}
add_action('customize_register', 'ip_master_customize_social_icons');

/**
 * Register a phone general setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_general_phone($wp_customize)
{
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_phone_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_phone_text',
		array(
			'label'       => esc_html__('Phone Number', 'ip_master'),
			'section' => 'ip_master_general_section',
			'type'    => 'text',
		)
	);
}
add_action('customize_register', 'ip_master_customize_general_phone');

/**
 * Register a email general setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_general_email($wp_customize)
{
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_email_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_email_text',
		array(
			'label'       => esc_html__('Email', 'ip_master'),
			'section' => 'ip_master_general_section',
			'type'    => 'text',
		)
	);
}
add_action('customize_register', 'ip_master_customize_general_email');

/**
 * Register a checkbox footer setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_footer_checkbox($wp_customize)
{
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_footer_checkbox',
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ip_master_footer_checkbox',
		array(
			'type' => 'checkbox',
			'section' => 'ip_master_footer_section',
			'label' => __('Show the Inverse Paradox Footer Copyright'),
		)
	);

	function themeslug_sanitize_checkbox($checked)
	{
		// Boolean check.
		return ((isset($checked) && true == $checked) ? true : false);
	}
}
add_action('customize_register', 'ip_master_customize_footer_checkbox');

/**
 * Register copyright text setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_copyright_text($wp_customize)
{

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_copyright_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_copyright_text',
		array(
			'label'       => esc_html__('Copyright Text', 'ip_master'),
			'description' => esc_html__('The copyright text will be displayed in the footer. Basic HTML tags allowed.', 'ip_master'),
			'section' => 'ip_master_footer_section',
			'type'    => 'textarea',
		)
	);
}
add_action('customize_register', 'ip_master_customize_copyright_text');

/**
 * Register copyright text setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_announcement_text($wp_customize)
{
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_announcement_checkbox',
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_announce_checkbox',
		)
	);

	$wp_customize->add_control(
		'ip_master_announcement_checkbox',
		array(
			'label'       => esc_html__('Show Announcement', 'ip_master'),
			'type' => 'checkbox',
			'description' => esc_html__('The announcement bar will be diplayed with the below option of using a cookie name.', 'ip_master'),
			'section' => 'ip_master_header_section',
		)
	);

	function themeslug_announce_checkbox($checked)
	{
		// Boolean check.
		return ((isset($checked) && true == $checked) ? true : false);
	}

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_announcement_text',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_announcement_text',
		array(
			'label'       => esc_html__('Announcement Text', 'ip_master'),
			'description' => esc_html__('The announcement text will be displayed in the header. Basic HTML tags allowed.', 'ip_master'),
			'section' => 'ip_master_header_section',
			'type'    => 'textarea',
		)
	);
}
add_action('customize_register', 'ip_master_customize_announcement_text');

/**
 * Register header button setting.
 *
 * @author WDS
 * @param object $wp_customize Instance of WP_Customize_Class.
 */
function ip_master_customize_header_button($wp_customize)
{

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_link_type',
		array(
			'default'           => '',
			'sanitize_callback' => 'ip_master_sanitize_select',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(
		'ip_master_link_type',
		array(
			'label'       => esc_html__('Announcement Link', 'ip_master'),
			'description' => esc_html__('Display a custom button in the header.', 'ip_master'),
			'section'     => 'ip_master_header_section',
			'type'        => 'select',
			'choices'     => array(
				'none'   => esc_html__('No link', 'ip_master'),
				'link'   => esc_html__('Link to a custom URL', 'ip_master'),
				'page'   => esc_html__('Link to a page', 'ip_master'),
			),
		)
	);

	// Register a setting for the URL.
	$wp_customize->add_setting(
		'ip_master_link_type_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url',
		)
	);

	// Display the URL field... maybe!
	$wp_customize->add_control(
		'ip_master_link_type_url',
		array(
			'label'           => esc_html__('Announcement Link URL', 'ip_master'),
			'description'     => esc_html__('Enter the URL or email address to be used by the link in the header.', 'ip_master'),
			'section'         => 'ip_master_header_section',
			'type'            => 'url',
			'active_callback' => 'ip_master_customizer_is_header_button_url', // Only displays if the Link option is selected above.
		)
	);

	$wp_customize->add_setting(
		'ip_announcement_selected_page_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ip_announcement_selected_page_id',
		array(
			'label'    => __('Select a Page', 'ip_master'),
			'description'     => esc_html__('Select a page address to be used by the link in the header.', 'ip_master'),
			'section'         => 'ip_master_header_section',
			'type'     => 'dropdown-pages',
			'active_callback' => 'ip_master_customizer_is_header_button_page', // Only displays if the Link option is selected above.
		)
	);

	// Register a setting for the link text.
	$wp_customize->add_setting(
		'ip_master_link_type_text',
		array(
			'default'           => 'Learn More',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	// Display the text field... maybe!
	$wp_customize->add_control(
		'ip_master_link_type_text',
		array(
			'label'           => esc_html__('Link Text', 'ip_master'),
			'description'     => esc_html__('Enter the text to be displayed in the button in the announcement.', 'ip_master'),
			'section'         => 'ip_master_header_section',
			'type'            => 'text',
			'active_callback' => 'ip_master_customizer_is_header_button_link', // Only displays if the Link option is selected above.
		)
	);

	// Register a setting for the link text.
	$wp_customize->add_setting(
		'ip_master_cookie_name',
		array(
			'default'           => 'announcement-cookie',
			'sanitize_callback' => 'custom_sanitize_callback',
		)
	);

	// Display the text field... maybe!
	$wp_customize->add_control(
		'ip_master_cookie_name',
		array(
			'label'           => esc_html__('Cookie Name', 'ip_master'),
			'description'     => esc_html__('Changing the name of the cookie will allow display of new announcements regardles of the users current set cookie.', 'ip_master'),
			'section'         => 'ip_master_header_section',
			'type'            => 'text',
		)
	);

	// Register a setting for the link text.
	$wp_customize->add_setting(
		'ip_master_cookie_duration',
		array(
			'default'           => 7,
			'sanitize_callback' => 'themeslug_sanitize_number_absint',
		)
	);

	// Display the text field... maybe!
	$wp_customize->add_control(
		'ip_master_cookie_duration',
		array(
			'label'           => esc_html__('Cookie Duration', 'ip_master'),
			'description'     => esc_html__('The ammount of days the user can hide the announcement.', 'ip_master'),
			'section'         => 'ip_master_header_section',
			'type'            => 'number',
		)
	);

	function custom_sanitize_callback($input)
	{
		//returns true if checkbox is checked
		return (isset($input) && $input == true ? sanitize_title($input) : 'announcement-cookie');
	}

	function themeslug_sanitize_number_absint($number, $setting)
	{
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint($number);

		// If the input is an absolute integer, return it; otherwise, return the default
		return ($number ? $number : $setting->default);
	}
}
add_action('customize_register', 'ip_master_customize_header_button');

/**
 * Sanitizes the select dropdown in the customizer.
 *
 * @author WDS
 * @param string $input  The input.
 * @param string $setting The setting.
 * @return string
 * @author Corey Collins
 */
function ip_master_sanitize_select($input, $setting)
{

	// Ensure input is a slug.
	$input = sanitize_key($input);

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control($setting->id)->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return (array_key_exists($input, $choices) ? $input : $setting->default);
}

/**
 * Checks to see if the link option is selected in our button settings.
 *
 * @author WDS
 * @return boolean True/False whether or not the Link radio is selected.
 * @author Corey Collins
 */
function ip_master_customizer_is_header_button_url()
{

	// Get our button setting.
	$button_setting = get_theme_mod('ip_master_link_type');

	if ('link' !== $button_setting) {
		return false;
	}

	return true;
}

function ip_master_customizer_is_header_button_page()
{

	// Get our button setting.
	$button_setting = get_theme_mod('ip_master_link_type');

	if ('page' !== $button_setting) {
		return false;
	}

	return true;
}

function ip_master_customizer_is_header_button_link()
{

	// Get our button setting.
	$button_setting = get_theme_mod('ip_master_link_type');

	if (('link' === $button_setting) || ('page' === $button_setting)) {
		return true;
	}

	return false;
}
