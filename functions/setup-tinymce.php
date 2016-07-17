<?php
namespace Mimizuku\Functions;

function tiny_mce_before_init( $init ) {
	$init['body_class'] = 'p-entry__content';
	return $init;
}

add_filter( 'tiny_mce_before_init',  __NAMESPACE__ . '\\tiny_mce_before_init' );
