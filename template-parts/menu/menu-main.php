<!-- site-navigation -->
<nav role="navigation" aria-label="Main Navigation" class="navbar-megamenu">
    <?php if (has_nav_menu('main-menu')) : ?>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'navbar-nav',
                'items_wrap'     => '<ul id="%1$s" class="%2$s " role="menu-bar">%3$s</ul>',
                'walker'  => new walkernav(),
                'use_excerpt' => false,
            )
        );
        ?>
    <?php endif; ?>
</nav>
<!-- #site-navigation -->