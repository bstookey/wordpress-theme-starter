<?php

/**
 * Displays the site header
 *
 * @package IP
 * @subpackage IP Theme
 * @since  1.0
 */

$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>
<header class="global-header">
    <div class="site-header">
        <div class="header desktop">
            <div class="primary-menu-wrapper container">
                <div class="logo">
                    <a href="/" <?php if (has_custom_logo()) : ?>style="background-image: url('<?= esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))) ?>');" <?php endif ?> aria-label="Go to homepage"></a>
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
            <?php echo do_shortcode("[fs_woocommerce_cart_icon]"); ?>
        </div>
        <div class="header mobile">
            <?php get_template_part('/template-parts/menu/menu', 'mobile'); ?>
        </div>
    </div>
</header>