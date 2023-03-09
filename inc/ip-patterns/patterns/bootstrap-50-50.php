<?php

/**
 * Bootstrap 50/50
 *
 * @package fs_dev
 */

return array(
	'title'      => __('Bootstrap 50/50', THEME_DOMAIN),
	'categories' => array('theme_patterns'),
	'content'    => '<!-- wp:group {"className":"row"} -->
	<div class="wp-block-group row"><!-- wp:group {"className":"col-md-6"} -->
	<div class="wp-block-group col-md-6"></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"className":"col-md-6"} -->
	<div class="wp-block-group col-md-6"></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
