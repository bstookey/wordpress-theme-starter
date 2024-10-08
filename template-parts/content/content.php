<?php

/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wordpress
 */

?>

<article <?php post_class('single-article container'); ?>>
	<div class="single-post-container">
		<?php if (has_post_thumbnail()) : ?>
			<div class="featured-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="post-content <?php if (has_post_thumbnail()) : ?>featured-image<?php endif; ?>">
			<header class="entry-header">
				<?php
				if (is_single()) :
					the_title('<h1 class="entry-title">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;
				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<div class="posted-meta">
							<?php astrolab_master_posted_on(); ?>
						</div>


						<?php if (is_single()) : ?>
							<span class="reading-time">
								Reading Time: <?php echo reading_time(); ?>
							</span>
						<?php endif; ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php if (is_single()) : ?>
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. */
								__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'astrolab_master'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							the_title('<span class="screen-reader-text">"', '"</span>', false)
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'astrolab_master'),
							'after'  => '</div>',
						)
					);
					?>
				<?php else : ?>
					<?php
					the_excerpt(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. */
								__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'astrolab_master'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							the_title('<span class="screen-reader-text">"', '"</span>', false)
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'astrolab_master'),
							'after'  => '</div>',
						)
					);
					?>
				<?php endif; ?>
			</div><!-- .entry-content -->
		</div><!-- content -->
	</div><!-- display-flex container -->
</article><!-- #post-## -->