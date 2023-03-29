<?php
function astrolab_master_get_theme_colors()
{
    // these colors are copied from src > scss > global > variables
    $colors = '$colors: (
        red: #d31020,
        secondary: #6e6c6c,
        themeblack: #192232,
        black: #192232,
        white: #ffffff,
        blue: #20739a,
        lightyellow: #fff9c0,
        alto: #dddddd,
        codgray: #111111,
        dovegray: #666666,
        gallery: #eeeeee,
        grayalt: #929292,
        gray: #808080,
        mineshaft: #333333,
        silverchalice: #aaaaaa,
        silver: #cccccc,
        tundora: #454545,
        whitesmoke: #f1f1f1,
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
