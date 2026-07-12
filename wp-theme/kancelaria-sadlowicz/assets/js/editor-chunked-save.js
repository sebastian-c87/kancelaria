/**
 * Kancelaria Sadlowicz - zapis duzych stron w malych paczkach.
 *
 * Filtr WAF na home.pl ucina duze ciala zadan POST, przez co edytor blokowy
 * nie mogl zapisac stron wiekszych niz ok. 10 KB. Ten skrypt przechwytuje
 * zapis edytora: gdy tresc jest duza, wysyla ja w kawalkach po ok. 6 KB do
 * endpointu ks/v1/chunk-save (serwer skleja i zapisuje), a wlasciwe zadanie
 * zapisu leci dalej juz BEZ tresci - czyli malutkie i przechodzi przez filtr.
 *
 * Dla Kamili nic sie nie zmienia: klika "Aktualizuj" jak zawsze.
 */
( function () {
	if ( ! window.wp || ! wp.apiFetch ) {
		return;
	}

	var CHUNK_SIZE = 6000;   // znaki na paczke (bezpiecznie ponizej limitu filtra)
	var MIN_SIZE   = 8000;   // mniejsze tresci ida normalnie, bez ciecia

	// Nie rozcinaj pary zastepczej (emoji) na granicy paczki.
	function safeEnd( text, end ) {
		if ( end < text.length ) {
			var code = text.charCodeAt( end - 1 );
			if ( code >= 0xd800 && code <= 0xdbff ) {
				return end - 1;
			}
		}
		return end;
	}

	wp.apiFetch.use( function ( options, next ) {
		try {
			var path   = options.path || '';
			var method = ( options.method || 'GET' ).toUpperCase();
			var match  = path.match( /^\/wp\/v2\/(pages|posts)\/(\d+)(?![\d\/])/ );

			if ( ! match || ( 'POST' !== method && 'PUT' !== method ) ) {
				return next( options );
			}
			if ( path.indexOf( '/autosaves' ) !== -1 || path.indexOf( '/revisions' ) !== -1 ) {
				return next( options );
			}

			var data    = options.data || {};
			var content = typeof data.content === 'string' ? data.content : null;

			if ( ! content || content.length < MIN_SIZE ) {
				return next( options );
			}

			var postId = parseInt( match[2], 10 );
			var token  = ( Date.now().toString( 36 ) + Math.random().toString( 36 ).slice( 2 ) ).replace( /[^a-z0-9]/g, '' );

			// Potnij tresc na paczki.
			var chunks = [];
			var pos    = 0;
			while ( pos < content.length ) {
				var end = safeEnd( content, Math.min( pos + CHUNK_SIZE, content.length ) );
				chunks.push( content.slice( pos, end ) );
				pos = end;
			}

			// Wyslij paczki po kolei, potem pusc zapis bez tresci.
			var sequence = Promise.resolve();
			chunks.forEach( function ( chunk, index ) {
				sequence = sequence.then( function () {
					return wp.apiFetch( {
						path:   '/ks/v1/chunk-save',
						method: 'POST',
						data: {
							post_id: postId,
							index:   index,
							total:   chunks.length,
							token:   token,
							chunk:   chunk,
						},
					} );
				} );
			} );

			return sequence
				.then( function ( last ) {
					if ( ! last || last.complete !== true || last.saved !== true ) {
						throw new Error( 'ks-chunk-save: niekompletny zapis' );
					}
					// Tresc jest juz w bazie - wlasciwy zapis leci bez niej (maly request).
					var slim = {};
					for ( var key in data ) {
						if ( Object.prototype.hasOwnProperty.call( data, key ) && 'content' !== key ) {
							slim[ key ] = data[ key ];
						}
					}
					var newOptions = {};
					for ( var opt in options ) {
						if ( Object.prototype.hasOwnProperty.call( options, opt ) ) {
							newOptions[ opt ] = options[ opt ];
						}
					}
					newOptions.data = slim;
					return next( newOptions );
				} )
				.catch( function () {
					// Awaria kanalu paczek - sprobuj normalnie (zadziala dla malych tresci).
					return next( options );
				} );
		} catch ( e ) {
			return next( options );
		}
	} );
} )();
