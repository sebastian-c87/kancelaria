<?php get_header(); ?>

<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Błąd 404</span>
        </div>
        <h1 class="page-hero-title">Strona nie <em>istnieje</em></h1>
        <p class="page-hero-desc">Przepraszamy – szukana strona nie została znaleziona.</p>
        <div class="page-hero-actions">
            <a href="<?php echo home_url('/'); ?>" class="btn-gold">
                Strona główna
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-ghost">Kontakt</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
