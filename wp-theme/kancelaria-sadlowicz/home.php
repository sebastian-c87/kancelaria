<?php
/**
 * Blog - lista wpisow (natywne wpisy WordPress).
 * Nowy artykul: wp-admin -> Wpisy -> Dodaj nowy.
 */
get_header();
?>
<main id="content">

<section class="page-hero">
	<div class="container">
		<div class="page-hero-eyebrow">
			<div class="page-hero-eyebrow-line"></div>
			<span class="page-hero-eyebrow-text">Kancelaria Adwokacka · Warszawa</span>
		</div>
		<h1 class="page-hero-title">Blog <em>prawny</em></h1>
		<p class="page-hero-desc">Praktyczne artykuły i porady prawne - pisane prostym językiem, bez żargonu.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
		<div class="blog-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				$cats = get_the_category();
				?>
				<article class="blog-card">
					<div class="blog-meta">
						<span class="blog-date"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></span>
						<?php if ( $cats ) : ?>
							<span class="blog-cat"><?php echo esc_html( $cats[0]->name ); ?></span>
						<?php endif; ?>
					</div>
					<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="blog-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
					<a href="<?php the_permalink(); ?>" class="blog-link">Czytaj więcej</a>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="ks-pagination">
			<?php the_posts_pagination( array( 'prev_text' => '&larr; Nowsze', 'next_text' => 'Starsze &rarr;' ) ); ?>
		</div>
		<?php else : ?>
			<p style="padding:48px 0;">Brak wpisów - dodaj pierwszy w wp-admin -> Wpisy -> Dodaj nowy.</p>
		<?php endif; ?>
	</div>
</section>

</main>
<?php get_footer(); ?>
