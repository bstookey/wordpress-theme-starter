<?php

/**
 * Register Menus
 *
 * @package fs_dev
 */

register_nav_menus(
    array(
        'courtesy-menu' => __('Courtesy', THEME_DOMAIN),
        'primary-menu' => __('Primary', THEME_DOMAIN),
        'footer-menu' => __('Footer Menu', THEME_DOMAIN),
        'footer-social' => __('Footer Social', THEME_DOMAIN),
        'mobile'  => __('Mobile Menu', THEME_DOMAIN),
    )
);
