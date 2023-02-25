<?php

/**
 * Flush out the transients used in IP_categorized_blog.
 *
 * @package IP
 */

namespace WebDevStudios\IP;

/**
 * Flush out the transients used in IP_categorized_blog.
 *
 * @author WebDevStudios
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

add_action('delete_category', __NAMESPACE__ . '\category_transient_flusher');
add_action('save_post', __NAMESPACE__ . '\category_transient_flusher');
