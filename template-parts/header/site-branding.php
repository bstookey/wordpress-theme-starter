<!-- site-branding -->
<div class="site-branding">
    <?php $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) : ?>

        <a href="/" aria-label="<?= get_bloginfo('name') ?>" title="<?= get_bloginfo('name') ?>" style="background-image: url('<?= get_logo_url(); ?>');" class="logo">
            <span class="sr-only"><?= get_bloginfo('name') ?> home page</span>
        </a>

    <?php endif ?>


    <?php if (is_front_page() && is_home()) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
    <?php else : ?>
        <p class="site-title h1"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
    <?php endif; ?>

    <?php
    $description = get_bloginfo('description', 'display');
    if ($description || is_customize_preview()) : ?>
        <p class="site-description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
</div>
<!-- #site-branding -->