<?php get_header(); ?>

<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Blog Prawny</span>
        </div>
        <h1 class="page-hero-title"><?php the_archive_title('<em>', '</em>'); ?></h1>
        <?php if (get_the_archive_description()): ?>
        <p class="page-hero-desc"><?php the_archive_description(); ?></p>
        <?php endif; ?>
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
        <p style="text-align:center; padding:60px 0;">Brak wpisów.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
