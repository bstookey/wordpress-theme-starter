<?php

/**
 * Echo the announcement saved in the Customizer.
 *
 * @return bool
 */


function display_announcement_text()
{

    // Grab our customizer settings.
    $announcement_text = get_theme_mod('fs_master_announcement_text') ?: cust_theme_option('alertbar_copy');
    $selected_page_url = get_the_permalink(get_theme_mod('fs_announcement_selected_page_id'));
    $type =  get_theme_mod('fs_master_link_type');

    $announce_link = '';
    switch ($type) {

        case 'link':
            $announce_link = '<a href="' . get_theme_mod('fs_master_link_type_url') . '" target="_blank" class="cb-link">' .  get_theme_mod('fs_master_link_type_text') . '</a>';
            break;
        case 'page':
            $announce_link = '<a href="' . $selected_page_url . '" class="cb-link">' .  get_theme_mod('fs_master_link_type_text') . '</a>';
            break;
    }


    // Stop if there's nothing to display.
    if (!$announcement_text) {
        return false;
    } ?>

    <div id="announcement-banner" class="announcement-banner" data-id="<?= get_theme_mod('fs_master_cookie_name') ?>" data-days="<?= get_theme_mod('fs_master_cookie_duration') ?>">
        <div class="container">
            <div class="announcement">
                <?php printf('%s', $announcement_text); ?>
                <?= $announce_link ?>
            </div>
            <a href="javascript:void(0);" id="banner-accept" class="accept"><span class="fa fa-times"></span><span class="sr-only">Accept Cookies and close banner </span>Close</a>
        </div><!--/container-->
    </div><!--/announcement-->
<?php }
