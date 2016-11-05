<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Post_Class {

	public function __construct() {

		/**
		 * Sets up CSS classes for the current post
		 *
		 * @param array $classes An array of post classes
		 * @return array
		 */
		add_filter( 'post_class', function( $classes ) {
			if ( in_array( 'hentry', $classes ) ) {
				unset( $classes[ array_search( 'hentry', $classes ) ] );
			}

			if ( is_singular() ) {
				$classes['_p-entry'] = '_p-entry';
			}
			return $classes;
		} );
	}
}
