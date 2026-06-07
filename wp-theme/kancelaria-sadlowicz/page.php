<?php get_header(); ?>

<section class="page-hero">
    <div class="page-hero-diagonal"></div>
    <div class="container">
        <div class="page-hero-eyebrow">
            <div class="page-hero-eyebrow-line"></div>
            <span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
        </div>
        <h1 class="page-hero-title"><?php the_title(); ?></h1>
    </div>
</section>

<section class="content-section">
    <div class="container">
        <?php while (have_posts()): the_post(); ?>
        <div class="entry-content" style="max-width:800px; margin:0 auto; line-height:1.85; font-size:1.05rem;">
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
