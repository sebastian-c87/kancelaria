<?php
/**
 * Pojedynczy wpis na blogu.
 */
get_header();

while ( have_posts() ) :
	the_post();
	$cats = get_the_category();
	?>
<main id="content">

<section class="page-hero page-hero-compact">
	<div class="container">
		<div class="page-hero-eyebrow">
			<div class="page-hero-eyebrow-line"></div>
			<span class="page-hero-eyebrow-text">
				<?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?>
				<?php if ( $cats ) : ?> · <?php echo esc_html( $cats[0]->name ); ?><?php endif; ?>
			</span>
		</div>
		<h1 class="page-hero-title"><?php the_title(); ?></h1>
	</div>
</section>

<article class="section">
	<div class="container ks-entry">
		<?php the_content(); ?>

		<div class="ks-entry-footer">
			<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn-navy" style="display:inline-flex;">&larr; Wróć na blog</a>
			<a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" class="btn-gold" style="display:inline-flex;">Umów konsultację</a>
		</div>
	</div>
</article>

</main>
	<?php
endwhile;

get_footer();
