<?php

/**
 * The header for our theme
 *
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
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
	<!--.site-wrapper-->
	<div class="site-wrapper">
		<?php display_announcement_text(); ?>
		<?php
		if (is_front_page()) :
			get_template_part('template-parts/header/alert', 'banner');
		endif;
		?>
		<!--.page-wrap-->
		<div class="page-wrap">
			<div class="skip-links">
				<a href="#content_anchor" tabindex="1"><?php esc_html_e("Skip to content", 'starter'); ?></a>
				<a href="#footer_anchor" tabindex="1"><?php esc_html_e("Skip to footer", 'starter'); ?></a>
			</div>

			<?php

			// Header
			get_template_part('template-parts/header/site', 'header');

			?>
			<!--.page-content-wrap-->
			<div id="content_anchor" class="page-content-wrap">
				<!--.content-wrap-->
				<div class="content-wrap">