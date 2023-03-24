<?php

/**
 * Display header search.
 *
 * @package IP
 */

function ip_master_display_header_search()
{

    // Get our button setting.
    $button_setting = get_theme_mod('fs_master_search_checkbox');

    // If we have no button displayed, don't display the markup.
    if (!$button_setting) {
        return false;
    }
?>

    <div class="site-header-action">
        <div class="search-toggle search-toggle_desktop">
            <button class="search nav-search-button cta-button" aria-expanded="false" aria-label="Goto search form">
                <i class="fa-li fa fa-search"></i>
            </button>
        </div>
    </div><!-- .header-trigger -->
    <div class="desktop-search" id="desktop-search">
        <?php echo get_search_form(); ?>
    </div>
<?php
}
