<!-- site-navigation -->
<nav role="navigation" aria-label="Footer Social Navigation">
    <?php if (has_nav_menu('footer-social')) : ?>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-social',
                'menu_class'     => 'footer-social-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
            )
        );
        ?>
    <?php endif; ?>
</nav>
<!-- #site-navigation -->