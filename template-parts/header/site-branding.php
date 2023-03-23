<!-- site-branding -->
<div class="site-branding">
    <a href="/" aria-label="<?= get_bloginfo('name') ?>" title="<?= get_bloginfo('name') ?>" style="background-image: url('<?= get_logo_url(); ?>');" class="logo">
        <span class="sr-only"><?= get_bloginfo('name') ?> home page</span>
    </a>

    <?php
    $description = get_bloginfo('description', 'display');
    if ($description || is_customize_preview()) : ?>
        <p class="site-description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
</div>
<!-- #site-branding -->