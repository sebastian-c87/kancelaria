<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">
                <?php
                $cats = get_the_category();
                echo $cats ? esc_html($cats[0]->name) : 'Blog Prawny';
                ?>
            </span>
        </div>
        <h1 class="page-hero-title"><?php the_title(); ?></h1>
        <p class="page-hero-desc"><?php echo get_the_date('d.m.Y'); ?> · <?php echo get_the_author(); ?></p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <div style="max-width:800px; margin:0 auto;">
            <?php if (has_post_thumbnail()): ?>
            <div style="margin-bottom:40px; border-radius:8px; overflow:hidden;">
                <?php the_post_thumbnail('large', ['style' => 'width:100%; height:auto;']); ?>
            </div>
            <?php endif; ?>

            <div class="entry-content" style="line-height:1.85; font-size:1.05rem; color:var(--text-body);">
                <?php the_content(); ?>
            </div>

            <div style="margin-top:48px; padding-top:32px; border-top:1px solid var(--border-light); display:flex; gap:16px; flex-wrap:wrap; align-items:center; justify-content:space-between;">
                <a href="<?php echo home_url('/blog/'); ?>" class="btn-navy" style="display:inline-flex;">
                    ← Wszystkie wpisy
                </a>
                <?php
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                if ($prev_post): ?>
                <a href="<?php echo get_permalink($prev_post); ?>" class="btn-ghost" style="display:inline-flex;">
                    Poprzedni wpis →
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-inner">
            <div class="cta-text">
                <h2>Masz pytanie prawne?<br><em>Skontaktuj się</em></h2>
                <p>Umów konsultację - omówimy Twoją sprawę indywidualnie.</p>
            </div>
            <a href="<?php echo home_url('/kontakt/'); ?>" class="btn-gold">
                Umów konsultację
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>
