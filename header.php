<?php

/**
 * The header for our theme
 *
 *
 * @package WordPress Starter
 * @subpackage Starter Theme
 * @since  1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/favicon-16x16.png">
	<link rel="mask-icon" href="/<?php echo esc_url(get_template_directory_uri()); ?>assets/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#bfbfbf">
	<meta name="msapplication-config" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/browserconfig.xml">
	<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/favicon.ico?" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/favicon.ico?" type="image/x-icon" />
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
			<?php get_template_part('template-parts/menu/menu', 'courtesy'); ?>

			<div class="display-flex container">
				<?php get_template_part('template-parts/header/site', 'branding'); ?>
			</div><!-- .container -->

			<div class="bottom display-flex container">
				<?php if (has_nav_menu('primary') || has_nav_menu('mobile')) : ?>
					<button type="button" class="mobile-menu off-canvas-open" aria-expanded="false" aria-label="<?php esc_html_e('Open Menu', 'ip_master'); ?>">
						<span class="hamburger"></span>
					</button>
				<?php endif; ?>

				<?php get_template_part('template-parts/menu/menu', 'primary'); ?>

				<?php ip_master_display_header_search(); ?>
			</div><!-- #bottom -->
		</header>
		<!-- *site-header-->