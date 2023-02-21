<!-- site-navigation -->
<nav role="navigation" aria-label="Footer Navigation">
    <?php if (has_nav_menu('footer-menu')) : ?>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'menu_class'     => 'footer-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
                'use_excerpt' => false,
            )
        );
        ?>
    <?php endif; ?>
</nav>
<!-- #site-navigation -->