<?php

/**
 * Register Menus
 *
 * @package Wordpress
 */

register_nav_menus(
    array(
        'courtesy' => __('Courtesy', THEME_DOMAIN),
        'primary' => __('Primary', THEME_DOMAIN),
        'footer' => __('Footer Menu', THEME_DOMAIN),
        'footer-social' => __('Footer Social', THEME_DOMAIN),
        'mobile'  => __('Mobile Menu', THEME_DOMAIN),
    )
);
