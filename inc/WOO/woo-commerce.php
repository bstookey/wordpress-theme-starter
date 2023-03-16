<?php

/*
 * Shortcode for WooCommerce Cart Icon for Menu Item
 */

add_shortcode('fs_woocommerce_cart_icon', 'fs_woo_cart_icon');

/**
 * Check if WooCommerce is activated
 */
function fs_woo_cart_icon()
{
    if (class_exists('woocommerce')) {

        ob_start();

        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count

        $cart_url = wc_get_cart_url();  // Set variable for Cart URL

        echo '<div class="cart menu-item"><a class="cart-contents" href="' . $cart_url . '" title="Cart"><i class="fa fa-shopping-cart"></i>';

        if ($cart_count > 0) {
            echo '<span class="cart-contents-count">' . $cart_count . '</span>';
        }
        echo '</a></div>';

        return ob_get_clean();
    }
}

/**
 * Update Cart count on add
 */
add_filter('woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1);

function iconic_cart_count_fragments($fragments)
{

    $fragments['span.cart-contents-count'] = '<span class="cart-contents-count">' . WC()->cart->get_cart_contents_count() . '</span>';

    return $fragments;
}

/*
 * Redirect non-logged-in users from Users Dashboard page
 */
add_action('template_redirect', function () {

    if (is_page('users-dashboard') && !is_user_logged_in()) {

        wp_redirect(home_url() . '/my-account/', 301);
        exit;
    }
});
