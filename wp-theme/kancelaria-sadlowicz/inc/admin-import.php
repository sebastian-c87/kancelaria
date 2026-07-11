<?php
/**
 * Narzedzie: Kancelaria - tresc stron (wp-admin -> Narzedzia).
 *
 * Pozwala wgrac tresc strony OD STRONY SERWERA - z wzorca motywu albo
 * z pliku wp-content/ks-import/<slug>.html. Omija to limity/filtry
 * infrastruktury (WAF home.pl ucina duze zadania POST do REST API),
 * bo tresc nie przechodzi przez HTTP, tylko jest czytana z dysku.
 *
 * Uzycie z plikiem:
 * 1. Utworz w Menedzerze plikow katalog wp-content/ks-import/
 * 2. Wgraj tam plik o nazwie <slug>.html (np. oferta.html) z trescia blokowa
 * 3. wp-admin -> Narzedzia -> Kancelaria - tresc stron -> "Wgraj z pliku"
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'admin_menu', function () {
	add_management_page(
		'Kancelaria - tresc stron',
		'Kancelaria - tresc stron',
		'manage_options',
		'ks-content-tool',
		'ks_content_tool_page'
	);
} );

function ks_content_tool_pages() {
	return array(
		'start'         => 'strona-start',
		'oferta'        => 'strona-oferta',
		'specjalizacje' => 'strona-specjalizacje',
		'o-mnie'        => 'strona-o-mnie',
		'faq'           => 'strona-faq',
		'kontakt'       => 'strona-kontakt',
	);
}

function ks_content_tool_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( 'Brak uprawnien.' );
	}

	$pages      = ks_content_tool_pages();
	$import_dir = WP_CONTENT_DIR . '/ks-import';
	$notice     = '';

	if ( isset( $_POST['ks_action'], $_POST['ks_slug'] ) && check_admin_referer( 'ks_content_tool' ) ) {
		$slug   = sanitize_key( wp_unslash( $_POST['ks_slug'] ) );
		$action = sanitize_key( wp_unslash( $_POST['ks_action'] ) );
		$page   = get_page_by_path( $slug, OBJECT, 'page' );

		if ( ! $page instanceof WP_Post || ! isset( $pages[ $slug ] ) ) {
			$notice = '<div class="notice notice-error"><p>Nie znaleziono strony o adresie /' . esc_html( $slug ) . '/.</p></div>';
		} else {
			$content = '';
			$source  = '';

			if ( 'file' === $action ) {
				$file = $import_dir . '/' . $slug . '.html';
				if ( file_exists( $file ) ) {
					$content = trim( (string) file_get_contents( $file ) );
					$source  = 'pliku ks-import/' . $slug . '.html (' . size_format( strlen( $content ) ) . ')';
				} else {
					$notice = '<div class="notice notice-error"><p>Brak pliku wp-content/ks-import/' . esc_html( $slug ) . '.html - wgraj go najpierw przez Menedzer plikow.</p></div>';
				}
			} elseif ( 'pattern' === $action ) {
				$content = ks_get_pattern_content( $pages[ $slug ] );
				$source  = 'wzorca motywu (' . size_format( strlen( $content ) ) . ')';
			}

			if ( $content ) {
				$result = wp_update_post( array(
					'ID'           => $page->ID,
					'post_content' => wp_slash( $content ),
				), true );

				if ( is_wp_error( $result ) ) {
					$notice = '<div class="notice notice-error"><p>Blad zapisu: ' . esc_html( $result->get_error_message() ) . '</p></div>';
				} else {
					// Weryfikacja: odczytaj z bazy i porownaj dlugosc.
					clean_post_cache( $page->ID );
					$saved = get_post( $page->ID );
					$ok    = $saved && strlen( $saved->post_content ) >= strlen( $content ) - 10;
					$notice = '<div class="notice notice-success"><p>Strona "' . esc_html( $saved->post_title ) . '" zaktualizowana z ' . esc_html( $source ) . '.'
						. ( $ok ? ' Weryfikacja: tresc zapisana w bazie (' . size_format( strlen( $saved->post_content ) ) . ').' : ' UWAGA: zapisana tresc jest krotsza niz zrodlo - sprawdz strone.' )
						. ' <a href="' . esc_url( get_permalink( $page->ID ) ) . '" target="_blank">Zobacz strone</a></p></div>';
				}
			}
		}
	}

	echo '<div class="wrap"><h1>Kancelaria - tresc stron</h1>';
	echo $notice; // phpcs:ignore WordPress.Security.EscapeOutput
	echo '<p>Narzedzie wgrywa tresc strony bezposrednio na serwerze (bez zadania HTTP z przegladarki), wiec dziala takze dla duzych stron blokowanych przez filtr hostingu.</p>';
	echo '<p><strong>Wgraj z pliku:</strong> umiesc plik <code>wp-content/ks-import/&lt;adres&gt;.html</code> (np. <code>oferta.html</code>) przez Menedzer plikow home.pl, potem kliknij przycisk.<br>';
	echo '<strong>Przywroc wzorzec:</strong> nadpisuje strone oryginalna trescia z motywu (cofa wszystkie zmiany na tej stronie!).</p>';

	echo '<table class="widefat striped" style="max-width:900px"><thead><tr><th>Strona</th><th>Rozmiar w bazie</th><th>Plik w ks-import</th><th>Akcje</th></tr></thead><tbody>';

	foreach ( $pages as $slug => $pattern ) {
		$page = get_page_by_path( $slug, OBJECT, 'page' );
		$file = $import_dir . '/' . $slug . '.html';
		echo '<tr><td><strong>' . ( $page ? esc_html( $page->post_title ) : esc_html( $slug ) ) . '</strong><br><code>/' . esc_html( $slug ) . '/</code></td>';
		echo '<td>' . ( $page ? esc_html( size_format( strlen( $page->post_content ) ) ) : '-' ) . '</td>';
		echo '<td>' . ( file_exists( $file ) ? esc_html( size_format( filesize( $file ) ) . ', ' . date_i18n( 'd.m.Y H:i', filemtime( $file ) ) ) : '<em>brak</em>' ) . '</td>';
		echo '<td>';
		if ( $page ) {
			echo '<form method="post" style="display:inline-block;margin-right:8px">';
			wp_nonce_field( 'ks_content_tool' );
			echo '<input type="hidden" name="ks_slug" value="' . esc_attr( $slug ) . '"><input type="hidden" name="ks_action" value="file">';
			echo '<button class="button button-primary"' . ( file_exists( $file ) ? '' : ' disabled' ) . '>Wgraj z pliku</button></form>';

			echo '<form method="post" style="display:inline-block" onsubmit="return confirm(\'Nadpisac strone oryginalnym wzorcem z motywu? Zmiany na tej stronie zostana cofniete.\');">';
			wp_nonce_field( 'ks_content_tool' );
			echo '<input type="hidden" name="ks_slug" value="' . esc_attr( $slug ) . '"><input type="hidden" name="ks_action" value="pattern">';
			echo '<button class="button">Przywroc wzorzec</button></form>';
		}
		echo '</td></tr>';
	}

	echo '</tbody></table></div>';
}
