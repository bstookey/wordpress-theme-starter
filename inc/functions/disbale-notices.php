<?php

add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
add_action('login_enqueue_scripts', 'ds_admin_theme_style');
function ds_admin_theme_style()
{
    //if (!is_super_admin() || !current_user_can('manage_options')) {
    remove_all_actions('admin_notices');
    //}
}
