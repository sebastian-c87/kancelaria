<?php
/**
 * Szablon awaryjny.
 */
get_header();
?>
<main id="content">
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		if ( is_singular() ) {
			the_content();
		} else {
			?>
			<div class="container" style="padding:48px 32px;">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
			</div>
			<?php
		}
	}
}
?>
</main>
<?php get_footer(); ?>
