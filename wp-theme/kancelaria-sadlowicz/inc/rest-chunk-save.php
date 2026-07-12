<?php
/**
 * Zapis tresci w malych paczkach (obejscie filtra WAF home.pl).
 *
 * Filtr hostingu ucina duze ciala zadan POST do REST API (prog miedzy
 * ok. 10 a 65 KB), przez co edytor blokowy nie mogl zapisywac duzych stron.
 * Skrypt assets/js/editor-chunked-save.js dzieli tresc na kawalki po ok. 6 KB
 * i wysyla je tutaj po kolei. Ostatni kawalek skleja calosc i zapisuje
 * strone po stronie serwera (wp_update_post) - z pominieciem limitu.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'rest_api_init', function () {
	register_rest_route( 'ks/v1', '/chunk-save', array(
		'methods'             => 'POST',
		'permission_callback' => function ( $request ) {
			$post_id = (int) $request['post_id'];
			return $post_id > 0 && current_user_can( 'edit_post', $post_id );
		},
		'args'                => array(
			'post_id' => array( 'required' => true, 'type' => 'integer' ),
			'index'   => array( 'required' => true, 'type' => 'integer' ),
			'total'   => array( 'required' => true, 'type' => 'integer' ),
			'token'   => array( 'required' => true, 'type' => 'string' ),
			'chunk'   => array( 'required' => true, 'type' => 'string' ),
		),
		'callback'            => 'ks_chunk_save_handler',
	) );
} );

function ks_chunk_save_handler( WP_REST_Request $request ) {
	$post_id = (int) $request['post_id'];
	$index   = (int) $request['index'];
	$total   = (int) $request['total'];
	$token   = preg_replace( '/[^a-z0-9]/', '', (string) $request['token'] );
	$chunk   = (string) $request['chunk'];

	if ( $total < 1 || $total > 500 || $index < 0 || $index >= $total || '' === $token ) {
		return new WP_Error( 'ks_bad_args', 'Nieprawidlowe parametry.', array( 'status' => 400 ) );
	}

	$key    = 'ks_chunks_' . $post_id . '_' . get_current_user_id() . '_' . $token;
	$chunks = get_transient( $key );
	if ( ! is_array( $chunks ) ) {
		$chunks = array();
	}

	$chunks[ $index ] = $chunk;
	set_transient( $key, $chunks, 10 * MINUTE_IN_SECONDS );

	// Czekamy na komplet kawalkow.
	if ( count( $chunks ) < $total ) {
		return array( 'complete' => false, 'received' => count( $chunks ), 'total' => $total );
	}

	// Komplet - sklej w kolejnosci i zapisz.
	ksort( $chunks );
	$content = implode( '', $chunks );
	delete_transient( $key );

	$result = wp_update_post( array(
		'ID'           => $post_id,
		'post_content' => wp_slash( $content ),
	), true );

	if ( is_wp_error( $result ) ) {
		return new WP_Error( 'ks_save_failed', $result->get_error_message(), array( 'status' => 500 ) );
	}

	// Weryfikacja: odczytaj z bazy.
	clean_post_cache( $post_id );
	$saved = get_post( $post_id );
	$ok    = $saved && strlen( $saved->post_content ) === strlen( $content );

	return array(
		'complete' => true,
		'saved'    => $ok,
		'bytes'    => $saved ? strlen( $saved->post_content ) : 0,
	);
}
