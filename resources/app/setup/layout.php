<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'mimizuku_layout', function( $layout ) {
	if ( is_page() && get_post_meta( get_the_ID(), '_wp_page_template', true ) ) {
		return $layout;
	}

	return get_theme_mod( 'basic-layout' );
} );
