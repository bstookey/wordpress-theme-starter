<?php

/**
 * Filters WYSIWYG content with the_content filter.
 *
 * @package IP
 *
 * @param string $content content dump from WYSIWYG.
 *
 * @return string|bool Content string if content exists, else empty.
 */

function get_post_content($content)
{
	return !empty($content) ? $content : false;
}

add_filter('the_content', 'get_post_content', 20);
