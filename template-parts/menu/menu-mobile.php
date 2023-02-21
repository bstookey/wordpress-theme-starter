<div class="mobile-menu-wrapper">
    <div clas="mobile-menu">
        <div class="header">
            <div class="logo">
                <a href="/"></a>
            </div>
            <div class="nav-trigger nav-icon2">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="nav-mobile">
            <?php get_template_part('/template-parts/menu/menu', 'main'); ?>
        </div>
        <div class="search-wrapper">
            <?php get_search_form(
                array(
                    'label' => __('Search', 'starter'),
                    'aria_label' => __('Search', 'starter')
                )
            ); ?>
        </div>
    </div>
</div>