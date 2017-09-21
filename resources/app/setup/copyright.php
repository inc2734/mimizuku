<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'mimizuku_copyright', function( $copyright ) {
	return get_option( 'mwt-copyright' );
} );
