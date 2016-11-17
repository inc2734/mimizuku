<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * Prints the header attributes
 *
 * @return void
 */
function header_attributes() {
	$bs_header_layout = apply_filters( 'mimizuku_bs_header_layout', null );
	if ( $bs_header_layout ) {
		printf( 'data-l-header-type="%1$s"', esc_attr( $bs_header_layout ) );
	}
}
