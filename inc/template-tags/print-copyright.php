<?php

/**
 * Dynamic copyright year creation
 *
 * @param string  $year
 * 
 * @package IP
 */

function auto_copyright($year = 'auto')
{
    $output = '';
    $now = intval(date('Y'));

    if (intval($year) == 'auto' || (intval($year) >= $now)) {
        $output = $now;
    } else if (intval($year) < $now) {
        $output = sprintf('%s - %s', intval($year), date('Y'));
    }

    return esc_html($output);
}

/**
 * Echo the copyright text saved in the Customizer.
 *
 * @return bool
 */
function display_copyright_text()
{
    // Grab our customizer settings.
    $copyright_text = get_theme_mod('fs_master_copyright_text');

    // Stop if there's nothing to display.
    if (!$copyright_text) {
        return false;
    }

    echo esc_html($copyright_text); // phpcs: xss ok.
}
