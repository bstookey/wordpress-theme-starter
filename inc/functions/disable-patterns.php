<?php

/**
 * Disable block patterns
 * 
 * @package Wordpress
 */

add_action('init', 'removeCorePatterns');

function removeCorePatterns()
{
    remove_theme_support('core-block-patterns');

    unregister_block_pattern_category('query');
    unregister_block_pattern_category('buttons');
    //unregister_block_pattern_category('uncategorized'); // this one is a mystery and causes a php error.
}
