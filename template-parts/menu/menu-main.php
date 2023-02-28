<!-- site-navigation -->
<nav id="acsbMenu" class="nav desktop navbar-megamenu">

    <div class="main-nav-container">

        <span class="toggle-nav close"><span class="toggle-nav__icon close"></span></span>

        <?php // display the main navigation
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'main-nav navbar-nav',
                'container'  => false,
                'walker'  => new walkernav(),
                'use_excerpt' => false,
            )
        );
        ?>
    </div>
</nav><!-- #site-navigation -->