<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Gorny pasek kontaktowy -->
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

<!-- Nawigacja -->
<nav class="navbar" id="navbar">
	<div class="inner">
		<div class="nav-brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<strong>Kamila Sadłowicz</strong>
				<span>Adwokat · Kancelaria Adwokacka</span>
			</a>
		</div>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'nav-menu',
			'menu_id'        => 'navMenu',
			'fallback_cb'    => 'ks_nav_fallback',
			'depth'          => 1,
		) );
		?>
		<div class="hamburger" id="hamburger">
			<span></span><span></span><span></span>
		</div>
	</div>
</nav>
<?php
// Awaryjne menu, gdyby lokalizacja nie miala przypisanego menu.
function ks_nav_fallback() {
	$items = array(
		'Start'           => home_url( '/' ),
		'Oferta i Cennik' => home_url( '/oferta/' ),
		'Specjalizacje'   => home_url( '/specjalizacje/' ),
		'O mnie'          => home_url( '/o-mnie/' ),
		'Blog'            => home_url( '/blog/' ),
		'FAQ'             => home_url( '/faq/' ),
		'Kontakt'         => home_url( '/kontakt/' ),
	);
	echo '<ul class="nav-menu" id="navMenu">';
	foreach ( $items as $label => $url ) {
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}
?>
