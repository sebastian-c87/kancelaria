<?php
/**
 * Kancelaria Sadlowicz - funkcje motywu.
 *
 * Architektura: cala tresc stron mieszka w post_content jako bloki Gutenberga.
 * Edytor blokowy zapisuje przez REST API (jeden request JSON), wiec niski
 * limit max_input_vars na home.pl nie ma znaczenia. Zadnych pol ACF.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'KS_THEME_VERSION', '1.0.0' );

/* -------------------------------------------------- Wsparcie motywu */
add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );

	// Edytor ma wygladac jak strona.
	add_editor_style( array(
		'assets/css/fonts-editor.css',
		'assets/css/main.css',
		'assets/css/blocks.css',
		'assets/css/editor.css',
	) );

	// Ukryj domyslne wzorce WP - w przegladarce wzorcow zostaja tylko nasze,
	// zeby osoba nietechniczna nie zgubila sie w setkach obcych klockow.
	remove_theme_support( 'core-block-patterns' );

	register_nav_menus( array(
		'primary' => 'Menu glowne',
	) );
} );

/* -------------------------------------------------- Wymus edytor blokowy
 * Klasyczny edytor (TinyMCE) zapisuje formularzem POST na wp-admin/post.php
 * i wykladal sie na limicie max_input_vars home.pl. Blokowy zapisuje przez
 * REST API - dlatego twardo wymuszamy blokowy dla stron i wpisow.
 */
add_filter( 'use_block_editor_for_post', '__return_true', 100 );
add_filter( 'use_block_editor_for_post_type', '__return_true', 100 );

/* -------------------------------------------------- Style i skrypty */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'ks-fonts',
		'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Jost:wght@300;400;500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'ks-main', get_theme_file_uri( 'assets/css/main.css' ), array(), KS_THEME_VERSION );
	wp_enqueue_style( 'ks-blocks', get_theme_file_uri( 'assets/css/blocks.css' ), array( 'ks-main' ), KS_THEME_VERSION );

	wp_enqueue_script( 'ks-main', get_theme_file_uri( 'assets/js/main.js' ), array(), KS_THEME_VERSION, true );
	wp_enqueue_script( 'ks-kontakt', get_theme_file_uri( 'assets/js/kontakt.js' ), array(), KS_THEME_VERSION, true );
} );

// Klasa "js" na <html> zanim CSS schowa elementy .reveal (bez JS nic nie znika).
add_action( 'wp_head', function () {
	echo "<script>document.documentElement.classList.add('js');</script>\n";
}, 0 );

/* -------------------------------------------------- Style blokow (przyciski) */
add_action( 'init', function () {
	register_block_style( 'core/button', array( 'name' => 'ks-gold',  'label' => 'Zloty' ) );
	register_block_style( 'core/button', array( 'name' => 'ks-navy',  'label' => 'Granatowy' ) );
	register_block_style( 'core/button', array( 'name' => 'ks-ghost', 'label' => 'Kontur' ) );

	register_block_pattern_category( 'kancelaria', array( 'label' => 'Kancelaria' ) );
} );

/* -------------------------------------------------- Tresc wzorca jako string
 * Uzywane przez auto-setup do wypelnienia stron przy aktywacji motywu.
 */
function ks_get_pattern_content( $slug ) {
	$file = get_theme_file_path( 'patterns/' . $slug . '.php' );
	if ( ! file_exists( $file ) ) {
		return '';
	}
	ob_start();
	include $file;
	return trim( ob_get_clean() );
}

/* -------------------------------------------------- Auto-setup przy aktywacji */
require_once get_theme_file_path( 'inc/setup-content.php' );
add_action( 'after_switch_theme', 'ks_setup_site_content' );

/* -------------------------------------------------- Narzedzie tresci (wp-admin -> Narzedzia) */
require_once get_theme_file_path( 'inc/admin-import.php' );
