<?php

/**
 * Bootstrap row
 *
 * @package Wordpress
 */

return array(
    'title'      => __('Bootstrap Row', THEME_DOMAIN),
    'categories' => array('theme_patterns'),
    'content'    => '<!-- wp:group {"className":"row","layout":{"type":"constrained"}} -->
    <div class="wp-block-group row"></div>
    <!-- /wp:group -->',
);
