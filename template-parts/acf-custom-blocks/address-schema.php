<?php
$address = (cust_theme_option('org_address') != "") ? cust_theme_option('org_address') . ", " : "";
$address2 = (cust_theme_option('org_address2') != "") ? cust_theme_option('org_address2') . ", " : "";
$city = (cust_theme_option('org_city') != "") ? cust_theme_option('org_city') . ", " : "";
$state = (cust_theme_option('org_state') != "") ? cust_theme_option('org_state') . " " : "";
$zip = (cust_theme_option('org_zip') != "") ? cust_theme_option('org_zip') : "";
$phone = (cust_theme_option('org_phone') != "") ? '<div><span class="title">Phone </span><strong><span itemprop="telephone">' . cust_theme_option('org_phone') . '</span></strong></div>' : "";
$fax = (cust_theme_option('org_fax') != "") ? '<div><span class="title">Fax </span><strong><span itemprop="faxNumber">' . cust_theme_option('org_fax') . '</span></strong></div>' : "";
$email = (cust_theme_option('org_email') != "") ? '<div><span class="title">Email </span><span itemprop="email"><a href="mailto:' . cust_theme_option('org_email') . '" class="text-black"> ' . cust_theme_option('org_email') . '</a></span></div>' : "";
?>
<?php if (is_admin()) : ?>
    <p>This will display address based on settings in <a href="/wp-admin/admin.php?page=cust-theme-options">Theme Options</a>.</p>
<?php endif; ?>
<div class="address-block" itemscope itemtype="https://schema.org/Organization">
    <div class="org"><span itemprop="name"><?= get_bloginfo('name') ?></span></div>
    <div class="address" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
        <div><span itemprop="streetAddress"><?= $address ?><?= $address2 ?></div>
        <div><span itemprop="addressLocality"><?= $city ?></span><span itemprop="addressRegion"><?= $state ?></span></div>
        <div><span itemprop="postalCode"><?= $zip ?></div>
        <span class="visually-hidden" itemprop="addressCountry">USA</span>
    </div>
    <?= $phone ?>
    <?= $fax ?>
    <?= $email ?>
</div>