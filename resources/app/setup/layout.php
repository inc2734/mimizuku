<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'mimizuku_layout', function( $layout ) {
	if ( is_front_page() && ! is_home() ) {
		return $layout;
	}

	if ( is_singular() ) {
		$_wp_page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
		if ( $_wp_page_template && 'default' !== $_wp_page_template ) {
			return $layout;
		}
	}

	return get_theme_mod( 'layout' );
} );
