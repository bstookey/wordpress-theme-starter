<?php

/**
 *
 * Adds theme custom blocks
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */

// Register Custom Blocks
add_action('acf/init', 'my_register_blocks');
function my_register_blocks()
{

  // check function exists.
  if (function_exists('acf_register_block_type')) {

    acf_register_block_type(array(
      'name'              => 'first-read-video',
      'title'             => __('Video Banner'),
      'description'       => __('A block for custom full width video banner.'),
      'render_template'   => '/template-parts/blocks/video-banner.php',
      'category'          => 'common',
      'icon'              => 'images-alt2',
      'align'              => 'full',
      'keywords'          => array('video', 'video-section', 'media'),
    ));
  }
}


// hide drafts for selectin posts via post post_status
add_filter('acf/fields/post_object/query', 'my_acf_fields_post_object_query', 10, 3);
function my_acf_fields_post_object_query($args, $field, $post_id)
{

  $args['post_status'] = 'publish';
  $args['orderby'] = 'post_in';
  $args['order'] = 'ASC';

  return $args;
}

add_action('enqueue_block_assets', 'acf_enqueue_scripts_and_styles');

function acf_enqueue_scripts_and_styles()
{

  // Map blockname with CSS filename
  $styles = array(
    "image-rotator" => "first-read-video"
  );

  // Enqueue everything in the admin view
  if (is_admin()) {
    foreach ($styles as $blockname => $style) {
      wp_enqueue_style("block-{$blockname}-css", get_stylesheet_directory_uri() . "/template-parts/blocks/css/{$style}.css");
    }
  }
}

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{
  // loop
  foreach ($items as &$item) {
    // vars
    $svg = htmlspecialchars_decode(get_field('svg', $item, true));
    // append icon
    if ($svg) {
      $item->title .= '<span>' . $svg . '</span>';
    }
  }
  // return
  return $items;
}
