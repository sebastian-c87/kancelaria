<?php
/**
 * Szablon strony: cala tresc (lacznie z hero) to bloki w edytorze.
 */
get_header();
?>
<main id="content">
<?php
while ( have_posts() ) {
	the_post();
	the_content();
}
?>
</main>
<?php get_footer(); ?>
