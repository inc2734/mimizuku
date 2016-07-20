<?php
namespace Mimizuku\Functions\PostClass;

/**
 * Sets up CSS classes for the current post
 *
 * @param array $classes An array of post classes
 * @return array
 */
function setup( $classes ) {
	if ( isset( $classes['hentry'] ) ) {
		unset( $classes['hentry'] );
	}

	$classes['_c-entry'] = '_c-entry';
	return $classes;
}
add_action( 'post_class', __NAMESPACE__ . '\\setup' );
