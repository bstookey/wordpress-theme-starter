<?php
function ip_master_get_theme_colors()
{
    // these colors are copied from src > scss > global > variables
    $colors = '$colors: (
        red: #d31020,
        secondary: #6e6c6c,
        theme-black: #192232,
        black: #192232,
        white: #fff,
        blue: #20739a,
        light-yellow: #fff9c0,
        alto: #ddd,
        cod-gray: #111,
        dove-gray: #666,
        gallery: #eee,
        gray-alt: #929292,
        gray: #808080,
        mineshaft: #333,
        silver-chalice: #aaa,
        silver: #ccc,
        tundora: #454545,
        whitesmoke: #f1f1f1,
        facebook: #1877f2,
        instagram: #e4405f,
        linkedin: #0a66c2,
        pinterest: #bd081c,
        rss: #f90,
        twitter: #1da1f2,
        youtube: #ff0000,
      );';

    $matches = [];
    preg_match_all('/(\w+):\s*#([0-9a-f]{6})/i', $colors, $matches, PREG_SET_ORDER);

    $color_array = array();
    foreach ($matches as $match) {
        $name = $match[1];
        $value = '#' . $match[2];
        $color_array[$name] = $value;
    }

    $final_array = array_merge($color_array);

    return $final_array;
}
