<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\PostClass;

/**
 * Sets up CSS classes for the current post
 *
 * @param array $classes An array of post classes
 * @return array
 */
add_action( 'post_class', function( $classes ) {
	if ( isset( $classes['hentry'] ) ) {
		unset( $classes['hentry'] );
	}

	$classes['_p-entry'] = '_p-entry';
	return $classes;
} );
