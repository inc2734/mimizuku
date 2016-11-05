<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Post_Class {

	public function __construct() {
		add_filter( 'post_class', [ $this, 'remove_hentry' ] );
		add_filter( 'post_class', [ $this, 'post_class' ] );
	}

	/**
	 * Remove .hentry
	 *
	 * @param array $classes An array of post classes
	 * @return array
	 */
	public function remove_hentry( $classes ) {
		if ( in_array( 'hentry', $classes ) ) {
			unset( $classes[ array_search( 'hentry', $classes ) ] );
		}
		return $classes;
	}

	/**
	 * Added ._p-entry
	 *
	 * @param array $classes An array of post classes
	 * @return array
	 */
	public function post_class( $classes ) {
		if ( is_singular() ) {
			$classes['_p-entry'] = '_p-entry';
		}
		return $classes;
	}
}
