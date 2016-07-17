<?php
namespace Mimizuku\Functions;

function setup_post_class( $classes ) {
	if ( isset( $classes['hentry'] ) ) {
		unset( $classes['hentry'] );
	}
	$classes['p-entry'] = 'p-entry';
	return $classes;
}

add_action( 'post_class', __NAMESPACE__ . '\\setup_post_class' );
