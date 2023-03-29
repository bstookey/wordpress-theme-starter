<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package IP
 */

get_header(); ?>

<main id="main" class="site-main posts">
	<?php
	if (have_posts()) :
		if (is_home() && !is_front_page()) :
	?>
			<header class="page-header container">
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
		endif; ?>

		<div class="posts-index container">
			<div class="sidebar">
				<div class="block">
					<h2>Categories</h2>
					<ul>
						<?php wp_list_categories(array(
							'orderby' => 'name',
							'title_li' => ''
						)); ?>
					</ul>
				</div><!--block-->

				<div class="block">
					<h2>Archives</h2>
					<ul>
						<?php wp_get_archives(array(
							'type' => 'monthly', '
					    	limit' => 12
						)); ?>
					</ul>
				</div><!--block-->
			</div><!--sidebar-->

			<div class="blog-content post-content">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content/content', get_post_format());

				endwhile;

				ip_master_display_numeric_pagination();

			else :
				get_template_part('template-parts/content', 'none'); ?>
			</div><!--blog-content-->

		<?php endif; ?>
		</div><!--flex-->
</main><!-- #main -->

<?php get_footer(); ?>