<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\Functions\BodyClass;

/**
 * Sets up CSS classes for the body
 *
 * @param array $classes An array of body classes
 * @return array
 */
function setup( $classes ) {
	$classes = array_merge( $classes, [
		'_l-body' => '_l-body',
	] );
	return $classes;
}
add_action( 'body_class', __NAMESPACE__ . '\\setup' );
