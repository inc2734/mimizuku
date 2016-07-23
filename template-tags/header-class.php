<?php
namespace Mimizuku\Tags;

/**
 * Display the header class attribute
 *
 * @return void
 */
function header_class() {
	$classes[] = '_l-header';

	$is_overlay_header = apply_filters( 'mimizuku_is_overlay_header', false );
	if ( $is_overlay_header ) {
		$classes[] = '_l-header--overlay';
	}

	$is_sticky_header = apply_filters( 'mimizuku_is_sticky_header', false );
	if ( $is_overlay_header && $is_sticky_header ) {
		$classes[] = '_l-header--sticky';
	}

	printf(
		'class="%s"',
		esc_attr( implode( ' ', $classes ) )
	);
}
