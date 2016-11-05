<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Tinymce {

	public function __construct() {
		add_filter( 'tiny_mce_before_init', [ $this, 'body_class' ] );
	}

	/**
	 * Sets up the TinyMCE body classes
	 *
	 * @param array $init An array with TinyMCE config
	 * @return array
	 */
	public function body_class( $init ) {
		$init['body_class'] = '_p-entry__content';
		return $init;
	}
}
