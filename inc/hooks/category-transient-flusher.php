<?php

/**
 * Flush out the transients used in IP_categorized_blog.
 *
 * @package IP
 *
 * @return bool Whether or not transients were deleted.
 */

function category_transient_flusher()
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return false;
	}

	// Like, beat it. Dig?
	return delete_transient('IP_categories');
}

add_action('delete_category', 'category_transient_flusher');
add_action('save_post', 'category_transient_flusher');
