<?php

/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IP
 * @subpackage IP Theme
 * @since  1.0
 */
$content = get_the_content();
$featured_img = (get_the_post_thumbnail_url($post->ID, 'full') != '') ? 'style="' . esc_attr(ip_background_image_style($id, 'thumbnail')) . ';"' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single">
		<div class="entry-content">
			<div class="post-content">
				<header class="entry-header">
					<?php
					the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
					?>
				</header><!-- .entry-header -->
				<div class="post-summary">
					<p><?= the_excerpt(); ?></p>
					<!-- <p><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark" class="read-more text-green">Continue Reading</a></p> -->
				</div>
			</div>
			<div class="post-col">
				<?php if (!empty($featured_img)) : ?>
					<div class="post-image">
						<div class="item-image offset-color" <?php echo urldecode($featured_img); ?>></div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->