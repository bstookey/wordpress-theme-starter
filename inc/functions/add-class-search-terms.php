<?php
// Add Bold to searched term
function highlight_results($text)
{
    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        if ($sr) {
            $keys = explode(" ", $sr);
            $keys = array_filter($keys);
            $regEx = '\'(?!((<.*?)|(<a.*?)))(\b' . implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
            $text = preg_replace($regEx, '<span class="search-highlight">\0</span>', $text);
        }
    }
    return $text;
}
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');
