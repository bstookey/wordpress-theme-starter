<?php

/**
 * Bootstrap 50/50
 */
return array(
	'title'      => __('Bootstrap 50/50', THEME_DOMAIN),
	'categories' => array('theme_patterns'),
	'content'    => '<!-- wp:columns {"className":"row"} -->
	<div class="wp-block-columns row"><!-- wp:column {"className":"col-md-6"} -->
	<div class="wp-block-column col-md-6"></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"className":"col-md-6"} -->
	<div class="wp-block-column col-md-6"></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->',
);
