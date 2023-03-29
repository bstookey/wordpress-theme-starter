<?php

/**
 * Displays the mobile menu with off-canvas background layer.
 *
 * @package Astrolab
 */

function astrolab_master_display_mobile_menu()
{
	// Bail if no mobile or primary menus are set.
	if (!has_nav_menu('mobile') && !has_nav_menu('primary')) {
		return '';
	}

	// Set a default menu location.
	$menu_location = 'primary';

	// If we have a mobile menu explicitly set, use it.
	if (has_nav_menu('mobile')) {
		$menu_location = 'mobile';
	}
?>
	<div class="off-canvas-screen"></div>
	<div class="off-canvas-container" aria-label="<?php esc_attr_e('Mobile Menu', THEME_DOMAIN); ?>" aria-hidden="true" tabindex="-1">
		<div class="mobile-nav-header">
			<a href="/" aria-label="<?= get_bloginfo('name') ?>" title="<?= get_bloginfo('name') ?>" style="background-image: url('<?= get_logo_url(); ?>');" class="logo">
				<span class="sr-only"><?= get_bloginfo('name') ?> home page</span>
			</a>
			<button type="button" class="off-canvas-close" aria-label="<?php esc_html_e('Close Menu', 'astrolab_master'); ?>">
				<span class="close"></span>
			</button>
		</div>

		<nav class="mobile-navigation" role="navigation" aria-label="<?php esc_attr_e('Mobile Navigation', THEME_DOMAIN); ?>">

			<?php
			// Mobile menu args.
			$mobile_args = [
				'theme_location'  => $menu_location,
				'container'       => false,
				'menu_id'         => 'mobile-menu',
				'menu_class'      => 'mobile-menu',
				'fallback_cb'     => false,
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			];

			// Display the mobile menu.
			wp_nav_menu($mobile_args);
			?>
		</nav>
	</div>
<?php
}
