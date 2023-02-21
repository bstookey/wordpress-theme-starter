<!-- site-navigation -->
<nav role="navigation" aria-label="Main Navigation">
    <?php if (has_nav_menu('primary-menu')) : ?>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary-menu',
                'menu_class'     => 'primary-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
            )
        );
        ?>
    <?php endif; ?>
</nav>
<!-- #site-navigation -->