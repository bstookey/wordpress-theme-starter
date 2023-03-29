<?php

/**
 * Plugin Name: Custom Post Type Models
 * Description: WordPress plugin containing content models, supports responsive Guttenburg theme
 * Version: 1.0.0
 * license GPL v2
 */

//require_once('cpt-maker.php'); // included via the functions file

/********************************
 * Simple Post Type Registration
 * See cpt-maker.php(DO NOT EDIT) for all of the defaults. Override here. DO NOT edit cpt-maker.php.
 * 
 * https://developer.wordpress.org/resource/dashicons/
 * 
 ********************************/

global $students, $books;

/* Students */
$students = new CPT_Maker(
    array(
        'key'        => 'student',
        'singular'    => 'Student',
        'plural'    => 'Students',
    ),
    '_',
    array(
        'supports'        => array('title', 'editor', 'page-attributes'),
        'hierarchical' => true, // needs to be set to true to support 'page-attributes' default is false
        'menu_icon'        => 'dashicons-groups', // see link above
        'menu_position'    => 8,
    )
);


/* Books */
$books = new CPT_Maker(
    array(
        'key'        => 'book',
        'singular'    => 'Book',
        'plural'    => 'Books',
    ),
    '_',
    array(
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail'),
        'menu_icon'        => 'dashicons-book',
        'menu_position'    => 9,
        'has_archive' => false,
        'show_in_rest' => true
    )
);

$books->add_taxonomy(
    array(
        'key'        => 'books_category',
        'singular'    => 'Book Category',
        'plural'    => 'Book Categories'
    ),
    '_'
);

$students->register();
$books->register();
