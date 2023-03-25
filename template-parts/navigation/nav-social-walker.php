<?php

/**
 * Custom Social Media Nav Walker by Aurooba Ahmed
 * This uses Font Awesome and adds in the correct icon by detecting the URL of the menu item.
 * You can use this by doing a custom wp_nav_menu query:
 * wp_nav_menu(array('items_wrap'=> '%3$s', 'walker' => new IP_Nav_Social_Walker(), 'container'=>false, 'menu_class' => '', 'theme_location'=>'social', 'fallback_cb'=>false ));
 *
 */

class IP_Nav_Social_Walker extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent\n";
    }
    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent\n";
    }
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        $output .= $indent . '';
        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;
        if (strpos($item->url, 'facebook') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-facebook"></i>';
            $item_output .= '</a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'twitter') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-twitter">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'linkedin') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-linkedin">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'instagram') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-instagram">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'youtube') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-youtube">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'pinterest') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-pinterest">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'reddit') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-reddit">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'snapchat') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-snapchat">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'vimeo') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-vimeo">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'whatsapp') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-whatsapp">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'tiktok') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-tiktok">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'telegram') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-telegram">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'quora') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-quora">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        } elseif (strpos($item->url, 'skype') !== false) {
            $item_output .= '<a' . $attributes . '><i class="fab fa-skype">';
            $item_output .= '</i></a>';
            $item_output .= $args->after;
        }


        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "\n";
    }
}
