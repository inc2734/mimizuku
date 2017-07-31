<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Google Analytics Tracking ID
 *
 * @param string $tracking_id
 * @return string
 */
add_filter( 'inc2734_wp_seo_google_analytics_tracking_id', function( $tracking_id ) {
	return get_theme_mod( 'google-analytics-tracking-id' );
} );

/**
 * Google Site Verification
 *
 * @param string $google_site_verification
 * @return string
 */
add_filter( 'inc2734_wp_seo_google_site_verification', function( $google_site_verification ) {
	return get_theme_mod( 'google-site-verification' );
} );

/**
 * Default og:image
 *
 * @param string $default_ogp_image_url
 * @return string
 */
add_filter( 'inc2734_wp_seo_defult_ogp_image_url', function( $default_ogp_image_url ) {
	return get_theme_mod( 'default-og-image' );
} );

/**
 * When you want to print ogp meta tags, return true
 *
 * @param bool false
 * @return bool
 */
add_filter( 'inc2734_wp_seo_ogp', '__return_true' );

/**
 * twitter:card
 *
 * @param string $twitter_card
 * @return string
 */
add_filter( 'inc2734_wp_seo_twitter_card', function( $twitter_card ) {
	return get_theme_mod( 'twitter-card' );
} );

/**
 * twitter:site
 *
 * @param string $twitter_site
 * @return string
 */
add_filter( 'inc2734_wp_seo_twitter_site', function( $twitter_site ) {
	return get_theme_mod( 'twitter-site' );
} );
