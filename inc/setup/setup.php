<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package IP
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @author WebDevStudios
 */
function setup()
{
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on IP, refer to the
	 * README.md file in this theme to find and replace all
	 * references of IP
	 */
	load_theme_textdomain('IP', get_template_directory() . '/build/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');


	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support('align-wide');

	// Gutenberg editor styles support.
	add_theme_support('editor-styles');

	// Gutenberg responsive embed support.
	add_theme_support('responsive-embeds');
}

add_action('after_setup_theme', 'setup');