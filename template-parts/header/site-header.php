<?php

/**
 * Displays the site header
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */

$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>
<header class="fixed-wrapper hc-white">
    <div class="header header_dark">

        <div class="header__container container">
            <div class="logo-wrap">
                <span class="toggle-nav" id="toggle-nav"><span class="toggle-nav__icon"></span></span>
                <h1 class="logo">
                    <a href="<?php bloginfo('url'); ?>">
                        <img class="logo__img" src="<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>" alt="Decorating Den Interiors" />
                    </a>
                </h1>
            </div>
            <div class="nav-wrap">
                <div class="courtesy-menu-wrap">
                    <div class="dealer-locator">
                        <div class="widget wpsl-search-widget">
                            <form action="https://decoratingsta.wpengine.com/store-locator/" method="post" id="wpsl-widget-form" class="dealer-locator__form">
                                <h3 class="dealer-locator__title">Find your local designer</h3>
                                <input type="text" name="wpsl-widget-search" placeholder="Zip/Postal Code" id="wpsl-widget-search" value="" class="dealer-locator__input">
                                <input id="wpsl-widget-submit" type="submit" value="" class="dealer-locator__input">
                            </form>
                        </div>
                    </div>
                </div>
                <nav id="acsbMenu" class="nav desktop">
                    <div class="main-nav-container">
                        <span class="toggle-nav close"><span class="toggle-nav__icon close"></span></span>
                        <?php // display the main navigation
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-menu',
                                'menu_class'     => 'main-nav navbar-nav',
                                'container'  => false,
                                'walker'  => new dd_walkernav(),
                                'use_excerpt' => false,
                            )
                        );
                        ?>
                    </div>
                </nav><!--END nav-->
            </div>
        </div><!--END container-->
    </div><!--END header-->
</header>