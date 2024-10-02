<?php

/**
 * Theme Custom Cover
 *
 * @package Wordpress
 */

$default_banner = get_theme_mod('deafult_banner_image') ? '"url":"' . get_theme_mod('deafult_banner_image') . '",' : '';
$banner_image = '';
if ($default_banner) {
	$banner_image = '<img class="wp-block-cover__image-background" alt="" src="' . get_theme_mod('deafult_banner_image') . '" data-object-fit="cover"/>';
}

return array(
	//'title'      => 'Theme Cover', THEME_DOMAIN), // This is boring
	'title'      => esc_html__('' . wp_get_theme()->get('Name') . ' Cover', THEME_DOMAIN),
	'categories' => array('theme_patterns'),
	'thumbnail' => $default_banner,
	'content'    => '<!-- wp:cover {' . $default_banner . '"dimRatio":0,"isDark":false} -->
	<div class="wp-block-cover is-light nwwa-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>' . $banner_image . '<div class="wp-block-cover__inner-container"><!-- wp:group {"className":"container"} -->
	<div class="wp-block-group container"><!-- wp:group {"className":"container-inner","layout":{"type":"constrained"}} -->
	<div class="wp-block-group  test container-inner"><!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","textColor":"white"} -->
	<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background wp-element-button">Learn More</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:paragraph {"align":"center","placeholder":"Write title…","textColor":"white","fontSize":"normal"} -->
	<p class="has-text-align-center has-white-color has-text-color has-normal-font-size">To be a recognized community leader by creating customer solutions, adding value to our services, and maintaining competitive rates through the implementation of sound business practices.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:heading {"textColor":"white"} -->
	<h2 class="has-white-color has-text-color">Contact</h2>
	<!-- /wp:heading --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div></div>
	<!-- /wp:cover -->',
);
