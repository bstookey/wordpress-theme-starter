<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #site-wrapper div .
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress
 * @subpackage Astrolab
 * @since  1.0
 */
?>

<!--Footer -->
<footer id="footer_anchor" class="site-footer">
  <div class="container">
    <div class="footer">
      <div class="footer-nav">
        <?php get_template_part('/template-parts/navigation/menu', 'footer'); ?>
      </div>
      <div class="address">
        <?php get_template_part('template-parts/footer/address', 'schema'); ?>
      </div>
      <div class="footer-social-nav social">
        <?php
        $social_menu = get_theme_mod('astrolab_master_social_menu_checkbox');

        if ($social_menu) {
          get_template_part('/template-parts/navigation/menu', 'footer-social');
        } else {
          print_social_network_links();
        }
        ?>
      </div>
    </div>
    <div class="copyright">
      <?php printf('&copy; Copyright %s.', auto_copyright(2023)); ?> <?php display_copyright_text(); ?>
    </div>
    <!---Sub Copyright --->
    <?php if (get_theme_mod('astrolab_master_footer_checkbox') == 1) { ?>
      <div class="sub-copyright">
        <a href="https://www.bradleystookey.com/" target="_blank">Custom WordPress Development</a> by Bradley Stookey.
      </div>
    <?php } ?>
    <!--#Sub Copyright -->
  </div>
</footer>
<!--#Footer -->
</div>
<!--#siteWrapper-->
<?php wp_footer(); ?>

<?php astrolab_master_display_mobile_menu(); ?>

</body>

</html>