<?php

/**
 * Customizer settings.
 *
 * @package IP
 */

/**
 * Register site announcement setting.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function ip_master_customize_header_announcement($wp_customize)
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
			'label'       => esc_html__('Show Announcement', THEME_DOMAIN),
			'type' => 'checkbox',
			'description' => esc_html__('The announcement bar will be diplayed with the below option of using a cookie name.', THEME_DOMAIN),
			'section' => 'ip_master_announcement_section',
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
			'label'       => esc_html__('Announcement Text', THEME_DOMAIN),
			'description' => esc_html__('The announcement text will be displayed in the header. Basic HTML tags allowed.', THEME_DOMAIN),
			'section' => 'ip_master_announcement_section',
			'type'    => 'textarea',
		)
	);

	// $wp_customize->add_control(
	// 	new Text_Editor_Custom_Control(
	// 		$wp_customize,
	// 		'ip_master_announcement_text',
	// 		array(
	// 			'label'       => esc_html__('Announcement Text', THEME_DOMAIN),
	// 			'description' => esc_html__('The announcement text will be displayed in the header. Basic HTML tags allowed.', THEME_DOMAIN),
	// 			'section' => 'ip_master_announcement_section',
	// 			'settings' => 'ip_master_announcement_text',
	// 			//'type'    => 'textarea',
	// 		)
	// 	)
	// );

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
			'label'       => esc_html__('Announcement Link', THEME_DOMAIN),
			'description' => esc_html__('Display a custom button in the header.', THEME_DOMAIN),
			'section'     => 'ip_master_announcement_section',
			'type'        => 'select',
			'choices'     => array(
				'none'   => esc_html__('No link', THEME_DOMAIN),
				'link'   => esc_html__('Link to a custom URL', THEME_DOMAIN),
				'page'   => esc_html__('Link to a page', THEME_DOMAIN),
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
			'label'           => esc_html__('Announcement Link URL', THEME_DOMAIN),
			'description'     => esc_html__('Enter the URL or email address to be used by the link in the header.', THEME_DOMAIN),
			'section'         => 'ip_master_announcement_section',
			'type'            => 'url',
			'active_callback' => 'ip_master_customizer_is_header_announcement_url', // Only displays if the Link option is selected above.
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
			'label'    => __('Select a Page', THEME_DOMAIN),
			'description'     => esc_html__('Select a page address to be used by the link in the header.', THEME_DOMAIN),
			'section'         => 'ip_master_announcement_section',
			'type'     => 'dropdown-pages',
			'active_callback' => 'ip_master_customizer_is_header_announcement_page', // Only displays if the Link option is selected above.
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
			'label'           => esc_html__('Link Text', THEME_DOMAIN),
			'description'     => esc_html__('Enter the text to be displayed in the button in the announcement.', THEME_DOMAIN),
			'section'         => 'ip_master_announcement_section',
			'type'            => 'text',
			'input_attrs' => array(
				'placeholder' => __('Learn More'),
			),
			'active_callback' => 'ip_master_customizer_is_header_announcement_link', // Only displays if the Link option is selected above.
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
			'label'           => esc_html__('Cookie Name', THEME_DOMAIN),
			'description'     => esc_html__('Changing the name of the cookie will allow display of new announcements regardles of the users current set cookie.', THEME_DOMAIN),
			'section'         => 'ip_master_announcement_section',
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
			'label'           => esc_html__('Cookie Duration', THEME_DOMAIN),
			'description'     => esc_html__('The ammount of days the user can hide the announcement.', THEME_DOMAIN),
			'section'         => 'ip_master_announcement_section',
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
add_action('customize_register', 'ip_master_customize_header_announcement');

/**
 * Register header search.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function ip_master_customize_header_search($wp_customize)
{
	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_search_checkbox',
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_search_checkbox',
		)
	);

	$wp_customize->add_control(
		'ip_master_search_checkbox',
		array(
			'label'       => esc_html__('Show Header Search', THEME_DOMAIN),
			'type' => 'checkbox',
			'description' => esc_html__('The search icon will display and will trigger a search form.', THEME_DOMAIN),
			'section' => 'ip_master_header_section',
		)
	);

	function themeslug_search_checkbox($checked)
	{
		// Boolean check.
		return ((isset($checked) && true == $checked) ? true : false);
	}
}
add_action('customize_register', 'ip_master_customize_header_search');

/**
 * Register a checkbox footer setting.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
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
			'label'       => esc_html__('Copyright Text', THEME_DOMAIN),
			'description' => esc_html__('The copyright text will be displayed in the footer. Basic HTML tags allowed.', THEME_DOMAIN),
			'section' => 'ip_master_footer_section',
			'type'    => 'textarea',
		)
	);
}
add_action('customize_register', 'ip_master_customize_copyright_text');

/**
 * Register a social icons setting.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function ip_master_customize_social_icons($wp_customize)
{

	// Register a setting.
	$wp_customize->add_setting(
		'ip_master_social_menu_checkbox',
		array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'themeslug_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ip_master_social_menu_checkbox',
		array(
			'type' => 'checkbox',
			'section' => 'ip_master_social_links_section',
			'label'    => sprintf(
				esc_html__('Use the footer social menu, not thesse settings.', THEME_DOMAIN),
				esc_url('/nav-menus.php')
			),
		)
	);

	// Create an array of our social links for ease of setup.
	$social_networks = array('Facebook', 'Instagram', 'LinkedIn', 'Twitter', 'YouTube', 'TikTok', 'Pinterest', 'SnapChat');

	// Loop through our networks to setup our fields.
	foreach ($social_networks as $network) {

		// Register a setting.
		$wp_customize->add_setting(
			'ip_' . sanitize_key($network) . '_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url',
			)
		);

		// Create the setting field.
		$wp_customize->add_control(
			'ip_' . sanitize_key($network) . '_link',
			array(
				'label'   => /* translators: the social network name. */ sprintf(esc_html__('%s', THEME_DOMAIN), ucwords($network)),
				'section' => 'ip_master_social_links_section',
				'type'    => 'text',
			)
		);
	}
}
add_action('customize_register', 'ip_master_customize_social_icons');

/**
 * Register a default images.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */
function ip_master_default_image_section($wp_customize)
{
	// Register a default banner image.
	$wp_customize->add_setting(
		'deafult_banner_image',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'deafult_banner_image',
		array(
			'label' => __('Default Banner Image', THEME_DOMAIN),
			'description' => esc_html__('This, in some cases will be used in some patterns and custom blocks FPO.', THEME_DOMAIN),
			'section' => 'ip_master_default_image_section',
			'settings' => 'deafult_banner_image',
			'height'      => 250,
			'width'       => 500,
		)
	));

	// Register a default banner image.
	$wp_customize->add_setting(
		'deafult_post_image',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport' => 'refresh',
		)
	);

	// Create the setting field.
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'deafult_post_image',
		array(
			'label' => __('Default Post Image', THEME_DOMAIN),
			'description' => esc_html__('This can be used, if needed, when a post image is not available', THEME_DOMAIN),
			'section' => 'ip_master_default_image_section',
			'settings' => 'deafult_post_image',
			'height'      => 250,
			'width'       => 500,
		)
	));
}
add_action('customize_register', 'ip_master_default_image_section');

/**
 * Register additional scripts.
 *
 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
 */

function ip_master_customize_additional_scripts($wp_customize)
{
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
			'label'       => esc_html__('Body Scripts', THEME_DOMAIN),
			'description' => esc_html__('Additional scripts to add to after the <body>. <script> tags requred.', THEME_DOMAIN),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);

	$wp_customize->add_control(new Text_Editor_Custom_Control($wp_customize, 'my_custom_textarea', array(
		'label'    => __('My Custom Textarea', 'mytheme'),
		'section'  => 'my_custom_section',
		'settings' => 'my_custom_textarea',
		'description' => 'Enter your text here',
	)));

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
			'label'       => esc_html__('Footer Scripts', THEME_DOMAIN),
			'description' => esc_html__('Additional scripts to add to the footer. Basic HTML tags are allowed.', THEME_DOMAIN),
			'section'     => 'ip_master_additional_scripts_section',
			'type'        => 'textarea',
		)
	);
}
add_action('customize_register', 'ip_master_customize_additional_scripts');

/**
 * Sanitizes the select dropdown in the customizer.
 *
 * @param string $input  The input.
 * @param string $setting The setting.
 * @return string
 *
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
 * Checks to see if option selected in our link type settings.
 *
 * @return boolean True/False whether or not Link is selected.
 *
 */
function ip_master_customizer_is_header_announcement_url()
{

	// Get our button setting.
	$link_type = get_theme_mod('ip_master_link_type');

	if ('link' !== $link_type) {
		return false;
	}

	return true;
}

function ip_master_customizer_is_header_announcement_page()
{

	// Get our button setting.
	$link_type = get_theme_mod('ip_master_link_type');

	if ('page' !== $link_type) {
		return false;
	}

	return true;
}

function ip_master_customizer_is_header_announcement_link()
{

	// Get our button setting.
	$link_type = get_theme_mod('ip_master_link_type');

	if (('link' === $link_type) || ('page' === $link_type)) {
		return true;
	}

	return false;
}
