<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/favicon.svg">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ===== TOP BAR ===== -->
<div class="top-bar">
    <div class="inner">
        <a href="tel:+48790013287">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92v2z"/></svg>
            +48 790 013 287
        </a>
        <div class="sep"></div>
        <a href="mailto:kamila.sadlowicz@kancelaria-sadlowicz.pl">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            kamila.sadlowicz@kancelaria-sadlowicz.pl
        </a>
        <div class="sep"></div>
        <span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
            ul. Arbuzowa 12, Warszawa
        </span>
    </div>
</div>

<!-- ===== NAVIGATION ===== -->
<?php
$is_home        = is_front_page();
$is_oferta      = is_page('oferta');
$is_spec        = is_page('specjalizacje');
$is_omnie       = is_page('o-mnie');
$is_blog        = is_home() || is_single() || is_archive();
$is_faq         = is_page('faq');
$is_kontakt     = is_page('kontakt');
?>
<nav class="navbar" id="navbar">
    <div class="inner">
        <div class="nav-brand">
            <a href="<?php echo home_url('/'); ?>">
                <strong>Kamila Sadłowicz</strong>
                <span>Adwokat · Kancelaria Adwokacka</span>
            </a>
        </div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="<?php echo home_url('/'); ?>"<?php echo $is_home ? ' class="active"' : ''; ?>>Start</a></li>
            <li><a href="<?php echo home_url('/oferta/'); ?>"<?php echo $is_oferta ? ' class="active"' : ''; ?>>Oferta i Cennik</a></li>
            <li><a href="<?php echo home_url('/specjalizacje/'); ?>"<?php echo $is_spec ? ' class="active"' : ''; ?>>Specjalizacje</a></li>
            <li><a href="<?php echo home_url('/o-mnie/'); ?>"<?php echo $is_omnie ? ' class="active"' : ''; ?>>O mnie</a></li>
            <li><a href="<?php echo home_url('/blog/'); ?>"<?php echo $is_blog ? ' class="active"' : ''; ?>>Blog</a></li>
            <li><a href="<?php echo home_url('/faq/'); ?>"<?php echo $is_faq ? ' class="active"' : ''; ?>>FAQ</a></li>
            <li><a href="<?php echo home_url('/kontakt/'); ?>" class="nav-cta<?php echo $is_kontakt ? ' active' : ''; ?>">Kontakt</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>
