<?php

/**
 * Register Google font.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @return string
 */
function ip_master_font_url()
{

    $fonts_url = '';

    /**
     * Translators: If there are characters in your language that are not
     * supported by the following, translate this to 'off'. Do not translate
     * into your own language.
     */
    $roboto    = esc_html_x('on', 'Roboto font: on or off', 'ip_master');
    $open_sans = esc_html_x('on', 'Open Sans font: on or off', 'ip_master');

    if ('off' !== $roboto || 'off' !== $open_sans) {
        $font_families = array();

        if ('off' !== $roboto) {
            $font_families[] = 'Roboto:400,700';
        }

        if ('off' !== $open_sans) {
            $font_families[] = 'Open Sans:400,300,700';
        }

        $query_args = array(
            'family' => rawurlencode(implode('|', $font_families)),
        );

        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
    }

    return $fonts_url;
}

function ip_google_fonts()
{
    // Register google fonts.
    wp_register_style('ip_master-google-font', ip_master_font_url(), array(), null);

    // Enqueue google fonts.
    wp_enqueue_style('ip_master-google-font');
}

add_action('wp_enqueue_scripts', 'ip_google_fonts');
