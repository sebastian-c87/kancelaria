<?php
/**
 * Auto-setup tresci przy aktywacji motywu.
 *
 * Tworzy strony wypelnione blokami (z plikow patterns/), menu glowne,
 * ustawia strone glowna i strone bloga, wpisy startowe na blogu.
 * Dziala tylko raz - istniejacych stron NIE nadpisuje, wiec ponowna
 * aktywacja motywu niczego nie psuje.
 *
 * Wstawianie odbywa sie po stronie serwera (wp_insert_post), wiec limit
 * max_input_vars na home.pl nie ma tu zadnego znaczenia.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function ks_setup_site_content() {

	/* ---------- 1. Strony z trescia z wzorcow ---------- */
	$pages = array(
		// slug => array( tytul, plik wzorca )
		'start'         => array( 'Start', 'strona-start' ),
		'oferta'        => array( 'Oferta i Cennik', 'strona-oferta' ),
		'specjalizacje' => array( 'Specjalizacje', 'strona-specjalizacje' ),
		'o-mnie'        => array( 'O mnie', 'strona-o-mnie' ),
		'faq'           => array( 'FAQ', 'strona-faq' ),
		'kontakt'       => array( 'Kontakt', 'strona-kontakt' ),
		'blog'          => array( 'Blog', '' ), // lista wpisow - szablon home.php
	);

	$created = array();

	foreach ( $pages as $slug => $def ) {
		$existing = get_page_by_path( $slug, OBJECT, 'page' );
		if ( $existing instanceof WP_Post ) {
			$created[ $slug ] = $existing->ID;
			continue;
		}
		$content = $def[1] ? ks_get_pattern_content( $def[1] ) : '';
		$id      = wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => $def[0],
			'post_name'    => $slug,
			'post_content' => wp_slash( $content ),
		) );
		if ( $id && ! is_wp_error( $id ) ) {
			$created[ $slug ] = $id;
		}
	}

	/* ---------- 2. Strona glowna i strona wpisow ---------- */
	if ( ! empty( $created['start'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $created['start'] );
	}
	if ( ! empty( $created['blog'] ) ) {
		update_option( 'page_for_posts', $created['blog'] );
	}

	/* ---------- 3. Menu glowne ---------- */
	$menu_name = 'Menu glowne';
	$menu      = wp_get_nav_menu_object( $menu_name );
	if ( ! $menu ) {
		$menu_id = wp_create_nav_menu( $menu_name );
		if ( ! is_wp_error( $menu_id ) ) {
			$order = 1;
			foreach ( array( 'start', 'oferta', 'specjalizacje', 'o-mnie', 'blog', 'faq', 'kontakt' ) as $slug ) {
				if ( empty( $created[ $slug ] ) ) { continue; }
				wp_update_nav_menu_item( $menu_id, 0, array(
					'menu-item-title'     => get_the_title( $created[ $slug ] ),
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $created[ $slug ],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
					'menu-item-position'  => $order++,
				) );
			}
			$locations            = get_theme_mod( 'nav_menu_locations', array() );
			$locations['primary'] = $menu_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	} else {
		// Menu istnieje - upewnij sie tylko, ze jest przypiete do lokalizacji.
		$locations = get_theme_mod( 'nav_menu_locations', array() );
		if ( empty( $locations['primary'] ) ) {
			$locations['primary'] = $menu->term_id;
			set_theme_mod( 'nav_menu_locations', $locations );
		}
	}

	/* ---------- 4. Wpisy startowe na blogu ---------- */
	$posts_file = get_theme_file_path( 'inc/blog-posts.php' );
	if ( file_exists( $posts_file ) ) {
		$posts = include $posts_file;
		if ( is_array( $posts ) ) {
			foreach ( $posts as $post_def ) {
				if ( get_page_by_path( $post_def['slug'], OBJECT, 'post' ) instanceof WP_Post ) {
					continue; // juz istnieje
				}
				$cat_id = 0;
				if ( ! empty( $post_def['category'] ) ) {
					$term = term_exists( $post_def['category'], 'category' );
					if ( ! $term ) {
						$term = wp_insert_term( $post_def['category'], 'category' );
					}
					if ( ! is_wp_error( $term ) ) {
						$cat_id = (int) ( is_array( $term ) ? $term['term_id'] : $term );
					}
				}
				wp_insert_post( array(
					'post_type'     => 'post',
					'post_status'   => 'publish',
					'post_title'    => $post_def['title'],
					'post_name'     => $post_def['slug'],
					'post_date'     => $post_def['date'] . ' 09:00:00',
					'post_excerpt'  => $post_def['excerpt'],
					'post_content'  => wp_slash( $post_def['content'] ),
					'post_category' => $cat_id ? array( $cat_id ) : array(),
				) );
			}
		}
	}

	/* ---------- 5. Ladne adresy ---------- */
	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
}
