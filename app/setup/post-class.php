<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Remove .hentry
 *
 * @param array $classes An array of post classes
 * @return array
 */
add_filter( 'post_class', function( $classes ) {
	if ( in_array( 'hentry', $classes ) ) {
		unset( $classes[ array_search( 'hentry', $classes ) ] );
	}
	return $classes;
} );

/**
 * Added ._c-entry
 *
 * @param array $classes An array of post classes
 * @return array
 */
add_filter( 'post_class', function( $classes ) {
	$classes['_c-entry'] = '_c-entry';
	return $classes;
} );
