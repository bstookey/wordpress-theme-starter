<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package Wordpress
 */


function setup()
{
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support('align-wide');

	// Gutenberg editor styles support.
	add_theme_support('editor-styles');
	add_editor_style('style-editor.css');

	// Gutenberg responsive embed support.
	add_theme_support('responsive-embeds');

	// Site Featured Image support.
	add_theme_support('post-thumbnails');
	//add_image_size('key-visual', 2560, 460, false);

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Additional content type attrubutes
	add_post_type_support('page', 'excerpt');
	add_post_type_support('post', 'page-attributes');

	// Add title tag support
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
}

add_action('after_setup_theme', 'setup');
