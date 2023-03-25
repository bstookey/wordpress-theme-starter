<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package IP
 * @subpackage IP Theme
 * @since  1.0
 * 
 */

get_header(); ?>

<main id="main" class="site-main hide-title">
	<section class="error-404 not-found container hentry">
		<div class="wp-block-cover__inner-container">
			<div class="container">
				<div class="wp-block-group__inner-container">
					<h1 class="page-title"><?php esc_html_e('Sorry, this page doesn\'t exist.', THEME_DOMAIN); ?></h1>
				</div>
			</div>
		</div>
		</div>
		<div class="page-content">

			<p><?php esc_html_e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', THEME_DOMAIN); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php get_footer(); ?>