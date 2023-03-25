<?php if (has_nav_menu('footer')) : ?>
    <!-- footer-navigation -->
    <nav id="footer-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Navigation', 'ip_master'); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'menu_class'     => 'footer-menu',
                'menu_id'     => 'footer-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
                'use_excerpt' => false,
                'container'      => false,
            )
        );
        ?>
    </nav>
    <!-- #footer-navigation -->
<?php endif; ?>