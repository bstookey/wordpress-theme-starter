<?php

/**
 * Echo the announcement saved in the Customizer.
 * 
 * Uses cookies managed via src > js > starter.js: APP.Banner
 *
 * @return bool
 */


function display_announcement_text()
{

    // Grab our customizer settings.
    $announcement_show = get_theme_mod('astrolab_master_announcement_checkbox');
    $announcement_text = get_theme_mod('astrolab_master_announcement_text'); //?: cust_theme_option('alertbar_copy');
    $announcement_name = get_theme_mod('astrolab_master_cookie_name'); //?: cust_theme_option('alertbar_id');
    $announcement_duration = get_theme_mod('astrolab_master_cookie_duration');
    $announcement_link_text =  get_theme_mod('astrolab_master_link_type_text');  //?: cust_theme_option('alertbar_cookie_time');
    $selected_page_url = get_the_permalink(get_theme_mod('ip_announcement_selected_page_id')); //?: cust_theme_option('alertbar_link') ;
    $type =  get_theme_mod('astrolab_master_link_type');

    $announce_link = '';
    switch ($type) {

        case 'link':
            $announce_link = '<a href="' . get_theme_mod('astrolab_master_link_type_url') . '" target="_blank" class="cb-link">' .  $announcement_link_text . '</a>';
            break;
        case 'page':
            $announce_link = '<a href="' . $selected_page_url . '" class="cb-link">' .  $announcement_link_text . '</a>';
            break;
    }


    // Stop if there's nothing to display.
    if ((!$announcement_text) || (!$announcement_show)) {
        return false;
    } ?>

    <div id="announcement-banner" class="announcement-banner" data-id="<?= $announcement_name ?>" data-days="<?= $announcement_duration ?>">
        <div class="container">
            <div class="announcement">
                <?php printf('%s', $announcement_text); ?>
                <?= $announce_link ?>
            </div>
            <a href="javascript:void(0);" id="banner-accept" class="accept"><span class="fa fa-times"></span><span class="sr-only">Accept Cookies and close banner </span></a>
        </div><!--/container-->
    </div><!--/announcement-->
<?php }
