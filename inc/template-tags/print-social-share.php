<?php

/**
 * Get the Twitter social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_twitter_share_url()
{
    return add_query_arg(
        array(
            'text' => rawurlencode(html_entity_decode(get_the_title())),
            'url'  => rawurlencode(get_the_permalink()),
        ),
        'https://twitter.com/share'
    );
}

/**
 * Get the Facebook social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_facebook_share_url()
{
    return add_query_arg('u', rawurlencode(get_the_permalink()), 'https://www.facebook.com/sharer/sharer.php');
}

/**
 * Get the LinkedIn social sharing URL for the current page.
 *
 * @author WDS
 * @return string
 */
function ip_master_get_linkedin_share_url()
{
    return add_query_arg(
        array(
            'title' => rawurlencode(html_entity_decode(get_the_title())),
            'url'   => rawurlencode(get_the_permalink()),
        ),
        'https://www.linkedin.com/shareArticle'
    );
}
