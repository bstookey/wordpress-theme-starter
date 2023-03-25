<?php if (has_nav_menu('primary')) : ?>
    <!-- primary-navigation -->
    <nav id="primary-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'ip_master'); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'menu_id'        => 'primary-menu',
                //'walker'  => new DD_Mega_Navwalker(),
                'use_excerpt' => false,
                'container'      => false,
            )
        );
        ?>
    </nav>
    <!-- #primary-navigation -->
<?php endif; ?>