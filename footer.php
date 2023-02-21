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
<footer class="site-footer">
  <div class="footer-nav">
    <?php get_template_part('/template-parts/menu/menu', 'footer'); ?>
  </div>
  <div class="footer-social-nav">
    <?php get_template_part('/template-parts/menu/menu', 'footer-social'); ?>
  </div>
  <div class="copyright">
    <?php printf('&copy; Copyright %s.', auto_copyright(2022)); ?>
  </div>
</footer>
</div>
</div>
<!--.siteWrapper-->
<?php wp_footer(); ?>
</body>

</html>