<?php

/**
 * The header for our theme
 *
 *
 * @package IP
 * @package IP Theme
 * @since  1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> tabindex="0">
	<?php print_customizer_body_scripts(); ?>
	<!--.site-wrapper-->
	<div class="site-wrapper">
		<div class="skip-links">
			<a href="#content_anchor" tabindex="1"><?php esc_html_e("Skip to content", 'starter'); ?></a>
			<a href="#footer_anchor" tabindex="1"><?php esc_html_e("Skip to footer", 'starter'); ?></a>
		</div>
		<?php display_announcement_text(); ?>
		<header class="site-header">
			<div class="container">
				<?php get_template_part('template-parts/navigation/menu', 'courtesy'); ?>
			</div>

			<div class="container">
				<?php get_template_part('template-parts/header/site', 'branding'); ?>
			</div><!-- .container -->

			<div class="bottom container">
				<?php if (has_nav_menu('primary') || has_nav_menu('mobile')) : ?>
					<button type="button" class="mobile-menu off-canvas-open nav-icon2" aria-expanded="false" aria-controls="mobile-navigation-menu" aria-label="<?php esc_html_e('Open Menu', 'ip_master'); ?>">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</button>
				<?php endif; ?>

				<?php get_template_part('template-parts/navigation/menu', 'primary'); ?>

				<?php ip_master_display_header_search(); ?>
			</div><!-- #bottom -->
		</header>
		<!-- *site-header-->