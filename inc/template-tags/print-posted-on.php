<?php

/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @package IP
 */

if (!function_exists('ip_master_posted_on')) :
    function ip_master_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="entry-date updated" datetime="%3$s"> updated on %4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
            /* translators: the date the post was published */
            esc_html_x('%s', 'post date', 'ip_master'),
            '<div>' . $time_string . '</div>'
        );

        $byline = sprintf(
            /* translators: the post author */
            esc_html_x('by %s', 'post author', 'ip_master'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

    }
endif;
