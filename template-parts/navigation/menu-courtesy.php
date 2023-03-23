<?php if (has_nav_menu('courtesy')) : ?>
    <!-- courtesy-navigation -->
    <nav id="courtesy-navigation" role="navigation" aria-label="Courtesy Navigation">

        <?php
        wp_nav_menu(
            array(
                'fallback_cb'    => false,
                'theme_location' => 'courtesy',
                'menu_id'        => 'courtesy-menu',
                'menu_class'     => 'courtesy-menu',
                'container'      => false,
            )
        );
        ?>
    </nav>
    <!-- #courtesy-navigation -->
<?php endif; ?>