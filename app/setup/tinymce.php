<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\TinyMCE;

/**
 * Sets up the TinyMCE config before init.
 *
 * @param array $init An array with TinyMCE config
 * @return array
 */
add_filter( 'tiny_mce_before_init',  function( $init ) {
	$init['body_class'] = '_p-entry__content';
	return $init;
} );
