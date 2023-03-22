<?php

/**
 *
 * Adds theme custom blocks
 *
 * @package WordPress Starter
 * @subpackage Starter Theme
 * @since  1.0
 * 
 */

// Make sure ACF is active.
if (!function_exists('acf_register_block_type')) {
  return;
}

/**
 * Init Custom blocks.
 */

add_action('acf/init', 'fs_master_acf_init');

function fs_master_acf_init()
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

    // Carousel Block
    acf_register_block_type(
      array(
        'name'            => 'ip-carousel',
        'title'           => esc_html__('Carousel', 'ip_master'),
        'description'     => esc_html__('A carousel with a call to action for each slide.', 'ip_master'),
        'render_callback' => 'ip_master_acf_block_registration_callback',
        'category'        => 'ip-blocks',
        'icon'            => 'slides',
        'keywords'        => array('carousel', 'slider', 'ip'),
        'mode'            => 'preview',
        'enqueue_assets'  => 'ip_master_acf_enqueue_carousel_scripts',
        'align'           => 'wide',
        'supports'        => $supports,
        'example'         => array(
          'attributes' => array(
            'data' => array(),
          ),
        ),
      )
    );

    // Accordion Block
    acf_register_block_type(array(
      'name' => 'accordion-block',
      'title' => __('Accordion Block'),
      'description' => esc_html__('accordion-block', 'wdg-coe'),
      'render_template' => $acf_block_path . 'accordion-block.php',
      //'enqueue_style' => get_stylesheet_directory_uri() . $acf_block_path . '/accordion.css',
      'category'        => 'ip-blocks',
      'icon' => 'button',
      'keywords' => array('dropdown', 'accordion', 'collapse'),
      'align' => 'full',
      'mode' => $mode_default,
      'supports' => array_merge($supports, array('align' => false)),
    ));
  }

  /** 
   * hide drafts for selecting posts via post post_status
   */

  add_filter('acf/fields/post_object/query', 'my_acf_fields_post_object_query', 10, 3);
  function my_acf_fields_post_object_query($args, $field, $post_id)
  {

    $args['post_status'] = 'publish';

    return $args;
  }
}

/**
 * Adds a WDS Block category to the Gutenberg category list.
 *
 * @param array  $categories The existing categories.
 * @param object $post The current post.
 * @return array The updated array of categories.
 */
function ip_master_add_block_categories($categories, $post)
{

  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'ip-blocks',
        'title' => esc_html__('IP Blocks', 'ip_master'),
      ),
    )
  );
}
add_filter('block_categories', 'ip_master_add_block_categories', 10, 2);



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
