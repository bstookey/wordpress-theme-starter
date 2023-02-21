<?php

/**
 * Displays the site header
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */
?>
<header class="global-header">
    <div class="site-header">
        <div class="header desktop">
            <div class="primary-menu-wrapper container">
                <div class="logo">
                    <a href="/"></a>
                </div>
                <div class="primary-nav">
                    <?php get_template_part('/template-parts/menu/menu', 'primary'); ?>
                </div>
            </div>
            <div class="main-menu-wrapper">
                <div class="main-nav container">
                    <?php get_template_part('/template-parts/menu/menu', 'main'); ?>
                </div>
            </div>
        </div>
        <div class="header mobile">
            <?php get_template_part('/template-parts/menu/menu', 'mobile'); ?>
        </div>
    </div>
</header>