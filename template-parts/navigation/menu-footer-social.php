<?php if (has_nav_menu('footer-social')) : ?>
    <!-- footer-social-links -->
    <nav role="navigation" aria-label="<?php esc_attr_e('Footer Social Navigation', 'astrolab_master'); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-social',
                'menu_class'     => 'footer-social social-icons',
                'menu_id'     => 'footer-social',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
                'walker' => new IP_Nav_Social_Walker(),
                'use_excerpt' => false,
                'container'      => false,
            )
        );
        ?>
    </nav>
    <!-- #footer-social-links -->
<?php endif; ?>