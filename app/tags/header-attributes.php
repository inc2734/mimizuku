<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * Display the header class attribute
 *
 * @param array $add_classes Array of classes you want to add
 * @return void
 */
function header_attributes( $add_classes = [] ) {
	$classes[] = '_l-header';

	$is_overlay_header = apply_filters( 'mimizuku_is_overlay_header', false );
	if ( $is_overlay_header ) {
		$classes[] = '_l-header--overlay';
	}

	$classes = array_merge( $classes, $add_classes );

	printf(
		'class="%s"',
		esc_attr( implode( ' ', $classes ) )
	);

	$is_sticky_header = apply_filters( 'mimizuku_is_sticky_header', false );
	if ( $is_sticky_header ) {
		echo 'data-bs-header-sticky="true"';
	}
}
