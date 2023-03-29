<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Astrolab
 * @subpackage Astrolab Theme
 * @since  1.0
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<div class="container">

			<?php if (have_posts()) :
				global $wp_query; ?>

				<header class="page-header">
					<h1 class="page-title underline left">
						Search Results
					</h1>
				</header><!-- .page-header -->
				<div class="search-results-form-wrapper">
					<?php
					get_search_form(
						array(
							'label' => __('', 'ip-master'),
						)
					);
					?>
				</div>
				<div class="">
					<strong>Your search for <?php echo get_search_query(); ?> has found <?php echo $wp_query->found_posts . ' results.'; ?></strong>
				</div>
		</div>
		<div class="bg-off-white results-wrapper">
			<div class="container">
				<div class="results-list">
				<?php
				// Start the Loop.
				while (have_posts()) :
					the_post();

					/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that
				 * will be used instead.
				 */
					get_template_part('template-parts/content/content', 'excerpt');

				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part('template-parts/content/content', 'none');

			endif;
				?>
				</div>
				<?php the_posts_pagination(array(
					'mid_size'  => 2,
					'prev_text' => __('<span class="fas fa-chevron-left"></span>', THEME_DOMAIN),
					'next_text' => __('<span class="fas fa-chevron-right"></span>', THEME_DOMAIN),
				)); ?>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
