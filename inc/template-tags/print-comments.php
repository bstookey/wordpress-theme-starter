<?php

/**
 * Display the comments if the count is more than 0.
 *
 * @package Wordpress
 */



/**
 * Display the comments if the count is more than 0.
 *
 *
 */
function print_comments()
{
	if (comments_open() || get_comments_number()) {
		comments_template();
	}
}
