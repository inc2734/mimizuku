<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Set count cache time
 *
 * @param  {int} $seconds
 * @return {int}
 */
add_filter( 'inc2734_wp_share_buttons_count_cache_seconds', function( $seconds ) {
	$new_seconds = get_theme_mod( 'share-buttons-cache-seconds' );
	if ( preg_match( '/^\d+$/', $new_seconds ) ) {
		return $new_seconds;
	}
	return $seconds;
} );
