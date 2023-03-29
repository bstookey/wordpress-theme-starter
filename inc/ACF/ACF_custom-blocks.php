<?php

/**
 *
 * Adds IP theme custom blocks
 *
 * @package Astrolab
 * @subpackage Astrolab Theme
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

add_action('acf/init', 'astrolab_master_acf_init');

function astrolab_master_acf_init()
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
        'title'           => esc_html__('Carousel', 'astrolab_master'),
        'description'     => esc_html__('A carousel with a call to action for each slide.', 'astrolab_master'),
        'render_template' => $acf_block_path . 'block-carousel.php',
        'category'        => 'ip-blocks',
        'icon'            => 'slides',
        'keywords'        => array('carousel', 'slider', 'ip'),
        'mode'            => 'preview',
        'enqueue_assets'  => 'astrolab_master_acf_enqueue_carousel_scripts',
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
function astrolab_master_add_block_categories($categories, $post)
{

  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'ip-blocks',
        'title' => esc_html__('IP Blocks', 'astrolab_master'),
      ),
    )
  );
}
add_filter('block_categories_all', 'astrolab_master_add_block_categories', 10, 2);

/**
 * Our callback function – this looks for the block based on its given name.
 * Name accordingly to the file name!
 *
 * @param array $block The block details.
 * @return void Bail if the block has expired.
 */
function astrolab_master_acf_block_registration_callback($block)
{

  // Convert the block name into a handy slug.
  $block_slug = str_replace('acf/', '', $block['name']);

  // Make sure we have fields.
  $start_date = isset($block['data']['other_options_start_date']) ? $block['data']['other_options_start_date'] : '';
  $end_date   = isset($block['data']['other_options_end_date']) ? $block['data']['other_options_end_date'] : '';

  // If the block has expired, then bail! But only on the frontend, so we can still see and edit the block in the backend.
  if (!is_admin() && astrolab_master_has_block_expired(
    array(
      'start_date' => strtotime($start_date, true),
      'end_date'   => strtotime($end_date, true),
    )
  )) {
    return;
  }

  astrolab_master_display_expired_block_message();

  // Include our template part.
  if (file_exists(get_theme_file_path('/template-parts/content-blocks/block-' . $block_slug . '.php'))) {
    include get_theme_file_path('/template-parts/content-blocks/block-' . $block_slug . '.php');
  }
}

/**
 * Enqueues a stylesheet for backend block styles.
 *
 * @return void Bail if we're not in the dashboard.
 */
function astrolab_master_acf_enqueue_backend_block_styles()
{

  if (!is_admin()) {
    return;
  }

  // Enqueue styles here, eventually. And scripts. Need to look at a good way of enqueuing things smartly on the backend without having to enqueue the whole of project.js, for instance.
  wp_enqueue_style('ip-gutenberg-blocks', get_template_directory_uri() . '/assets/css/gutenberg-blocks-style.css', array(), '1.0.0');
}

/**
 * Enqueues carousel scripts.
 *
 * @return void
 */
function astrolab_master_acf_enqueue_carousel_scripts()
{

  if (!is_admin()) {
    //return;
  }

  //astrolab_master_acf_enqueue_backend_block_styles();
  wp_register_style('slick-carousel', get_template_directory_uri() . '/assets/slick-carousel/slick/slick.css', null, '1.8.1');
  wp_register_script('slick-carousel-js', get_template_directory_uri() . '/assets/slick-carousel/slick/slick.min.js', array('jquery'), '1.8.1', true);
  wp_enqueue_style('slick-carousel');
  wp_enqueue_script('slick-carousel-js');
  //wp_enqueue_script('ip-block-js', get_template_directory_uri() . '/assets/js/apps.js', array('slick-carousel-js'), '1.0.0', true);
}

/**
 * Enqueues accordion scripts.
 *
 * @return void
 */
function astrolab_master_acf_enqueue_accordion_scripts()
{

  if (!is_admin()) {
    //return;
  }

  //astrolab_master_acf_enqueue_backend_block_styles();
  wp_enqueue_script('ip-block-js', get_template_directory_uri() . '/assets/js/apps.js', array('jquery'), '1.0.0', true);
}

/**
 * Returns the alignment set for a content block.
 *
 * @param array $block The block settings.
 * @return string The class, if one is set.
 */
function astrolab_master_get_block_alignment($block)
{

  if (!$block) {
    return;
  }

  return !empty($block['align']) ? ' align' . esc_attr($block['align']) : 'alignwide';
}

/**
 * Returns the class names set for a content block.
 *
 * @param array $block The block settings.
 * @return string The class, if one is set.
 */
function astrolab_master_get_block_classes($block)
{

  if (!$block) {
    return;
  }

  $classes  = '';
  $classes  = astrolab_master_get_block_expired_class();
  $classes .= !empty($block['className']) ? ' ' . esc_attr($block['className']) : '';

  return $classes;
}

/**
 * Returns a class to be used for expired blocks.
 *
 * @return string The class, if one is set.
 */
function astrolab_master_get_block_expired_class()
{

  if (!is_admin()) {
    return;
  }

  $other_options = get_sub_field('other_options') ? get_sub_field('other_options') : get_field('other_options')['other_options'];

  if (astrolab_master_has_block_expired(
    array(
      'start_date' => $other_options['start_date'],
      'end_date'   => $other_options['end_date'],
    )
  )) {
    return ' block-expired';
  }
}

/**
 * Displays a message for the user on the backend if a block is expired.
 *
 * @return void Bail if the block isn't expired.
 */
function astrolab_master_display_expired_block_message()
{

  if (!astrolab_master_get_block_expired_class()) {
    return;
  }

?>
  <div class="block-expired-message">
    <span class="block-expired-text"><?php esc_html_e('Your block has expired. Please change or remove the Start and End dates under Other Options to display your block on the frontend.', 'astrolab_master'); ?></span>
  </div>
  <?php
}

/**
 * Returns the ID (anchor link field) set for a content block.
 *
 * @param array $block The block settings.
 * @return string The ID, if one is set.
 */
function astrolab_master_get_block_id($block)
{

  if (!$block) {
    return;
  }

  return empty($block['anchor']) ? str_replace('_', '-', $block['id']) : esc_attr($block['anchor']);
}

/**
 * Displays a dummy carousel on the backend, since there won't be any rows to load when first adding.
 *
 * @param array $block The block settings.
 * @return void Bail if we have to.
 */
function astrolab_master_acf_gutenberg_display_admin_default_carousel($block)
{

  // Only in the dashboard.
  if (!is_admin()) {
    return;
  }

  // Only if we don't have rows added manually.
  if (have_rows('carousel_slides')) {
    return;
  }

  echo '<div class="content-block carousel-block">';

  for ($slides = 0; $slides < 2; $slides++) :
  ?>
    <section class="slide">
      <div class="slide-content container">
        <h2 class="slide-title"><?php esc_html_e('Slide Title', 'astrolab_master'); ?></h2>
        <p class="slide-description"><?php esc_html_e('Slide Content', 'astrolab_master'); ?></p>
      </div>
    </section>
<?php
  endfor;

  echo '</div>';
}
