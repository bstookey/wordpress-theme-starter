<?php

/**
 * Template Name: Sitemap
 *
 * This template displays a page with a sidebar on the right side of the screen.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package IP
 */
get_header(); ?>

<main id="main" class="site-main <?php if (get_field('hide_title')) : ?>hide-title<?php endif; ?>">
    <ul>
        <?php
        $xml = simplexml_load_file(get_home_path() . 'sitemap_index.xml');
        foreach ($xml->sitemap as $sitemap) {
            $url = $sitemap->loc;
            $xml_page = simplexml_load_file($url);
            foreach ($xml_page->url as $url) {
                $post_id = url_to_postid($url->loc);
                $post_title = get_the_title($post_id);
                echo '<li><a href="' . $url->loc . '">' . $post_title . '</a></li>';
            }
        }
        ?>
    </ul>
</main><!-- #main -->

<?php get_footer(); ?>