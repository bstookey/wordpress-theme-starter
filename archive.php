<?php

/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress
 */

get_header(); ?>

<main id="main" class="site-main posts">
	<?php if (have_posts()) : ?>
		<header class="page-header container">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->

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

			<div class="post-content">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
					get_template_part('template-parts/content/content', get_post_format());

				endwhile;

				astrolab_master_display_numeric_pagination();

			else :
				get_template_part('template-parts/content/content', 'none'); ?>
			</div><!--blog-content-->

		<?php endif; ?>
		</div><!--flex-->
</main><!-- #main -->
<?php get_footer(); ?>