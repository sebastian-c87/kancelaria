<?php get_header(); ?>

<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title">Blog <em>Prawny</em></h1>
        <p class="page-hero-desc">Artykuły prawne, porady i aktualności z zakresu prawa cywilnego, rodzinnego i gospodarczego.</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php if (have_posts()): ?>
        <div class="blog-grid">
            <?php while (have_posts()): the_post();
                $cats = get_the_category();
                $cat_name = $cats ? esc_html($cats[0]->name) : 'Artykuł';
            ?>
            <article class="blog-card">
                <div class="blog-meta">
                    <span class="blog-date"><?php echo get_the_date('d.m.Y'); ?></span>
                    <span class="blog-cat"><?php echo $cat_name; ?></span>
                </div>
                <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                <a href="<?php the_permalink(); ?>" class="blog-link">Czytaj więcej</a>
            </article>
            <?php endwhile; ?>
        </div>

        <div style="margin-top:40px; text-align:center;">
            <?php the_posts_pagination([
                'prev_text' => '← Poprzednie',
                'next_text' => 'Następne →',
            ]); ?>
        </div>

        <?php else: ?>
        <p style="text-align:center; padding:60px 0; color:var(--text-muted);">
            Brak wpisów. Zapraszam wkrótce.
        </p>
        <?php endif; ?>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner">
            <div class="cta-text">
                <h2>Masz pytanie prawne?<br><em>Skontaktuj się</em></h2>
                <p>Umów konsultację – omówimy Twoją sprawę indywidualnie.</p>
            </div>
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
