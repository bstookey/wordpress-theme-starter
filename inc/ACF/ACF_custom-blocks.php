<?php

/**
 *
 * Adds theme custom blocks
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */

// Make sure ACF is active.
if (!function_exists('acf_register_block_type')) {
  return;
}

/**
 * Init Custom blocks.
 */

add_action('acf/init', 'ip_master_acf_init');

function ip_master_acf_init()
{
  $mode_default = 'preview';
  $acf_block_path = '/template-parts/acf-custom-blocks/';

  $supports = array(
    'align' => array('full', 'wide'),
    'mode' => true,
    'anchor' => true,
    'jsx' => true
  );

  /**
   * check function exists.
   */

  if (function_exists('acf_register_block_type')) {

    // Accordion Block
    acf_register_block_type(array(
      'name' => 'accordion-block',
      'title' => __('Accordion Block'),
      'description' => esc_html__('accordion-block', 'wdg-coe'),
      'render_template' => $acf_block_path . 'accordion-block.php',
      //'enqueue_style' => get_stylesheet_directory_uri() . $acf_block_path . '/accordion.css',
      'category'        => 'wds-blocks',
      'icon' => 'button',
      'keywords' => array('dropdown', 'accordion', 'collapse'),
      'align' => 'full',
      'mode' => $mode_default,
      'supports' => array_merge($supports, array('align' => false)),
    ));
  }
}

/** 
 * hide drafts for selecting posts via post post_status
 */

add_filter('acf/fields/post_object/query', 'cf_fields_post_object_query', 10, 3);
function acf_fields_post_object_query($args, $field, $post_id)
{

  $args['post_status'] = 'publish';
  $args['orderby'] = 'post_in';
  $args['order'] = 'ASC';

  return $args;
}


/**
 *
 * Enqueue scripts and styles for admin
 * Uncomment to enqueue individually 
 * 
 */

// add_action('enqueue_block_assets', 'acf_enqueue_scripts_and_styles');

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
