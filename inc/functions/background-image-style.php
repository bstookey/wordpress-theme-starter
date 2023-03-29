<?php

/**
 * Return a sanitized background-image style URL for the post ID of a requested size
 *
 * @param integer $post_id ID of Post
 * @return string URL of Image
 */
function ip_background_image_style($post_id, $size)
{
    $style = '';

    if (!empty($post_id) && !empty($size) && has_post_thumbnail($post_id)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);

        if (!empty($image) && isset($image[0])) {
            $style = sprintf("background-image: url('%s')", esc_url($image[0]));
        }
    }
    return $style;
}
