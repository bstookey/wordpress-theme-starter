<?php
// custom walker to split drop downs
class walkernav extends Walker_Nav_Menu
{
    public $megaMenuID;

    public $count;

    public function __construct()
    {
        $this->megaMenuID = 0;

        $this->count = 0;
    }

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\" >\n";

        if ($this->megaMenuID != 0 && $depth == 0) {
            $output .= "<li class=\"megamenu-column\"><ul>\n";
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $hasMegaMenu = get_field('show_as_custom_dropdowns', $item);

        $class_names = $value = '';

        if ($hasMegaMenu) {
            array_push($classes, 'megamenu');
            $this->megaMenuID = $item->ID;
        }

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        //$classes[] = (empty($has_mega_menu)) ? 'no-megamenu' : array(); // not used becuase has mega is on child ele

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $attributes  = !empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="'   . esc_attr($item->url) . '"' : '';

        $item_output = '';

        if ($depth === 0) :
            $output .= $indent . '<li' . $id . $value . $class_names . ' data-depth="' . $depth . '">';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

        elseif (empty($has_mega_menu) and ($depth > 0)) :
            $output .= $indent . '<li' . $id . $value . $class_names . ' data-depth="' . $depth . '">';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

        elseif ($has_mega_menu) :
            $columns = get_field('custom_navigation_dropdowns', $item);
            $column_count = 0;

            foreach ($columns as $column) :
                if ($column_count > 0) :
                    $output .= '</ul>';
                    $output .= '<ul class="sub-menu">';
                endif;

                $img = $column["dd_featured_image"]["sizes"]["medium"];
                $img_alt = $column["dd_featured_image"]["alt"];

                $link = $column['dd_featured_nav_item_url'];

                $fn_text = $link["title"];
                $fn_url = $link["url"];

                if ($fn_text && $fn_url) {
                    $output .= '<li><a href="' . $fn_url . '"><span class="img-wrap"><img src="' . $img . '" alt="' . $img_alt . '"></span>' . $fn_text . '</a></li>';
                }

                $nav_items = $column["dd_nav_items"];

                if ($nav_items) :
                    foreach ($nav_items as $nav_item) :
                        $item_link = $nav_item['dd_nav_item_link'];

                        $item_text = $item_link['title'];
                        $item_url = $item_link['url'];

                        if ($item_text && $item_url) {
                            $output .= '<li><a href="' . $item_url . '">' . $item_text . '</a></li>';
                        }
                    endforeach;
                endif;

                $column_count++;
            endforeach;

        endif;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if ($depth == 0) {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $output .= "</li>{$n}";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent";
        $output .= "</ul></div>\n";
    }
}
