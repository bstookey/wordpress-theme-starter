<?php

/**
 * Display the social links saved in the customizer.
 *
 * @package fs_dev
 */


/**
 * Display the social links saved in the customizer.
 *
 *
 */
function print_social_network_links()
{
	// Create an array of our social links for ease of setup.
	// Change the order of the networks in this array to change the output order.
	$social_networks = [
		'facebook',
		'instagram',
		'linkedin',
		'twitter',
		'youtube',
	];

?>
	<ul class="flex social-icons menu">
		<?php
		// Loop through our network array.
		foreach ($social_networks as $network) :

			// Look for the social network's URL.
			$network_url = get_theme_mod('fs_' . $network . '_link');

			// Only display the list item if a URL is set.
			if (!empty($network_url)) :
		?>
				<li class="social-icon <?php echo esc_attr($network); ?> mr-2">
					<a href="<?php echo esc_url($network_url); ?>" title="<?php echo ucwords(esc_attr($network)); ?> ">
						<?php
						print_svg(
							[
								'icon'   => $network . '-square',
								'width'  => '24',
								'height' => '24',
							]
						);
						?>
						<span class="screen-reader-text">
							<?php
							/* translators: the social network name */
							printf(esc_attr__('Link to %s', THEME_DOMAIN), ucwords(esc_html($network))); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
							?>
						</span>
					</a>
				</li><!-- .social-icon -->
		<?php
			endif;
		endforeach;
		?>
	</ul><!-- .social-icons -->
<?php
}
