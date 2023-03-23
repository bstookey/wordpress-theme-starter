<?php
// Add Bold to searched term
function highlight_results($text)
{
    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        $keys = explode(" ", $sr);
        $keys = array_filter($keys);
        $text = preg_replace('/(' . $sr . ')/iu', '<span class="highlight">' . $sr . '</span>', $text);
    }
    return $text;
}
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');
