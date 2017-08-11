<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Like_Me_Box\Like_Me_Box;

new Like_Me_Box();

$facebook_page_name = get_option( 'inc2734-theme-option-facebook-page-name' );

if ( ! $facebook_page_name ) {
	return;
}

add_filter( 'inc2734_wp_like_me_box_thumbnail', function( $thumbnail ) {
	if ( $thumbnail ) {
		return $thumbnail;
	}

	if ( get_site_icon_url() ) {
		return get_site_icon_url();
	}

	if ( get_theme_mod( 'default-og-image' ) ) {
		return get_theme_mod( 'default-og-image' );
	}

	return $thumbnail;
} );

echo do_shortcode( '[wp_like_me_box facebook_page_name="' . $facebook_page_name . '"]' );
