<?php

/**
 * Social Sharing Buttons.
 *
 * @return string
 */

function ip_social_sharing_buttons()
{
    global $post;
    if (is_singular() || is_home()) {
        // Get current page URL
        $articleURL = urlencode(get_permalink());
        // Get current page title
        $articleTitle = str_replace(' ', '%20', get_the_title());
        // Construct sharing URL without using any script
        $twitterURL  = 'https://twitter.com/intent/tweet?text=' . $articleTitle . '&amp;url=' . $articleURL . '&amp;via=Crunchify';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $articleURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $articleURL . '&amp;title=' . $articleTitle;
        // Add sharing button at the end of page/page content
        $content = '<div class="social-share">';
        $content .= '<span>' . __('Share This Article:', 'ariesel') . '</span>';
        $content .= '<a class="social-share__link facebook" href="' . $facebookURL . '" target="_blank"><i class="fab fa-facebook-square"></i></a>';
        $content .= '<a class="social-share__link twitter" href="' . $twitterURL . '" target="_blank"><i class="fab fa-twitter"></i></a>';
        $content .= '<a class="social-share__link print-page" href="javascript:void(0);" onClick="print();" ><i class="fas fa-print"></i></a>';
        $content .= '</div>';
        echo $content;
    }
}

/**
 * Get the Twitter social sharing URL for the current page.
 *
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
