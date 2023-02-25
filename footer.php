<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Starter Theme
 * @since Starter Theme 1.0
 */
?>

</div>
<!--#content-wrap-->
</div>
<!--#page-content-wrap-->
<footer id="footer_anchor" class="site-footer">
  <div class="footer-nav">
    <?php get_template_part('/template-parts/menu/menu', 'footer'); ?>
  </div>
  <div class="footer-social-nav">
    <?php get_template_part('/template-parts/menu/menu', 'footer-social'); ?>
  </div>
  <div class="copyright">
    <?php printf('&copy; Copyright %s.', auto_copyright(2022)); ?> <?php display_copyright_text(); ?>

    <?php if (get_theme_mod('ip_master_footer_checkbox') == 1) { ?><a href="https://www.inverseparadox.com/" target="_blank">Custom WordPress Development</a> by Inverse Paradox.<?php } ?>
  </div>
</footer>
</div>
</div>
<!--.siteWrapper-->
<?php wp_footer(); ?>
</body>

</html>