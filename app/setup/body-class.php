<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Body_Class {

	public function __construct() {
		add_filter( 'body_class', [ $this, 'body_class' ] );
	}

	/**
	 * Sets up CSS classes for the body
	 *
	 * @param array $classes An array of body classes
	 * @return array
	 */
	public function body_class( $classes ) {
		return array_merge( $classes, [
			'_l-body' => '_l-body',
		] );
	}
}
