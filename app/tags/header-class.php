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
function header_class( $add_classes = [] ) {
	$classes[] = '_l-header';

	$is_overlay_header = apply_filters( 'mimizuku_is_overlay_header', false );
	if ( $is_overlay_header ) {
		$classes[] = '_l-header--overlay';
	}

	$is_sticky_header = apply_filters( 'mimizuku_is_sticky_header', false );
	if ( $is_overlay_header && $is_sticky_header ) {
		$classes[] = '_l-header--sticky';
	}

	$classes = array_merge( $classes, $add_classes );

	printf(
		'class="%s"',
		esc_attr( implode( ' ', $classes ) )
	);
}
