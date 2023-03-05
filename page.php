<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */

get_header(); ?>
<div class="page-content">

    <?php
    //display_icons();
    print_svg(
        [
            'icon'   => 'bell',
            'width'  => '24',
            'height' => '24',
        ]
    );

    if (have_posts()) {

        // Load posts loop.
        while (have_posts()) {
            the_post();
            the_content();
        }
    } else {

        // If no content, include the "No posts found" template.
        get_template_part('template-parts/content/content-none');
    } ?>
</div>
<?php get_footer(); ?>