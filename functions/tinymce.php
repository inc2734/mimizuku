<?php
namespace Mimizuku\Functions\TinyMCE;

/**
 * Sets up the TinyMCE config before init.
 *
 * @param array $init An array with TinyMCE config
 * @return array
 */
function tiny_mce_before_init( $init ) {
	$init['body_class'] = '_c-entry__content';
	return $init;
}
add_filter( 'tiny_mce_before_init',  __NAMESPACE__ . '\\tiny_mce_before_init' );
