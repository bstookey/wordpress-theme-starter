<!-- Alert/Cookie Banner -->
<?php if (cust_theme_option('display_cookiebar') == 1) : ?>
    <div id="cookie-banner" class="cookie-banner" data-id="<?= cust_theme_option('alertbar_id'); ?>" data-days="<?= cust_theme_option('alertbar_cookie_time'); ?>">
        <div class="cookie-banner-inner container">
            <div class="banner-text">
                <?php printf('%s', cust_theme_option('cookiebar_copy')); ?>
                <?php if (cust_theme_option('cookiebar_link_text')) : ?>
                    <span class="cb-link">
                        <a href="<?= get_permalink(cust_theme_option('cookiebar_link')); ?>"><?= cust_theme_option('cookiebar_link_text'); ?>
                        </a>&nbsp;&raquo;
                    </span>
                <?php endif ?>
            </div>
            <a href="javascript:void(0);" class="accept"><span aria-hidden="true">Close</span><span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.805" height="12.004" viewBox="0 0 11.805 12.004">
                        <g id="Group_96" data-name="Group 96" transform="translate(1.414 1.414)">
                            <path id="Path_44" data-name="Path 44" d="M0,0,4.588,4.588,0,9.176" transform="translate(8.977 9.176) rotate(180)" fill="none" stroke="#171a1a" stroke-linecap="round" stroke-width="2" />
                            <path id="Path_45" data-name="Path 45" d="M0,9.176,4.588,4.588,0,0" fill="none" stroke="#171a1a" stroke-linecap="round" stroke-width="2" />
                        </g>
                    </svg>
                </span>
                <span class="visually-hidden">Accept Cookies and close banner</span></a>
        </div>
    </div>
    <script>
        $(function() {
            APP.Banner.init();
        });
    </script>
<?php endif ?>
<!-- #Alert/Cookie Banner -->