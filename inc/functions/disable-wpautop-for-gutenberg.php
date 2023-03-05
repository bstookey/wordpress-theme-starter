<?php

/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 * @package IP
 */

/**
 * Disables wpautop to remove empty p tags in rendered Gutenberg blocks.
 *
 */

function disable_wpautop_for_gutenberg()
{
	// If we have blocks in place, don't add wpautop.
	if (has_filter('the_content', 'wpautop') && has_blocks()) {
		remove_filter('the_content', 'wpautop');
	}
}

add_filter('init', 'disable_wpautop_for_gutenberg', 9);
