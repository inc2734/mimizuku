<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\BodyClass;

/**
 * Sets up CSS classes for the body
 *
 * @param array $classes An array of body classes
 * @return array
 */
add_action( 'body_class', function( $classes ) {
	return array_merge( $classes, [
		'_l-body' => '_l-body',
	] );
} );
