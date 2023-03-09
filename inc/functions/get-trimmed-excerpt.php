<?php

/**
 * Limit the excerpt length.
 *
 * @package fs_dev
 *
 * @param array $args Parameters include length and more.
 *
 * @return string The excerpt.
 */
function get_trimmed_excerpt($args = [])
{

	// Set defaults.
	$defaults = [
		'length' => 20,
		'more'   => '...',
		'post'   => '',
	];

	// Parse args.
	$args = wp_parse_args($args, $defaults);

	// Trim the excerpt.
	return wp_trim_words(get_the_excerpt($args['post']), absint($args['length']), esc_html($args['more']));
}

/*
 * @param array post/page $id and length.
 *
 * @return string from excerpt or the content if no excerpt exists.
 * 
 */

function get_custom_excerpt($id, $word_count = 13, $more = '...')
{

	$text = get_the_excerpt($id);
	if (($text != "") and ($text != "NULL")) {
		$text = $text;
	} else {
		$text = get_the_content($id);
	}
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]>', $text);
	$text = strip_tags($text);
	$text = wp_trim_words($text, $word_count);

	return $text . $more;
}
add_filter('custom_excerpt', 'custom_excerpt');
