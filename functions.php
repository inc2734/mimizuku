<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'mimizuku_content_width', 1152 );
}

/**
 * Activate Inc2734_Customizer_Framework
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-customizer-framework/src/wp-customizer-framework.php' ) );

/**
 * Activate Inc2734_WP_Basis
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-basis/src/wp-basis.php' ) );
new Inc2734_WP_Basis();

/**
 * Activate Inc2734_WP_oEmbed_Blog_Card
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-oembed-blog-card/src/wp-oembed-blog-card.php' ) );
new Inc2734_WP_oEmbed_Blog_Card();

/**
 * Activate Inc2734_WP_OGP
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-ogp/src/wp-ogp.php' ) );

/**
 * Activate Inc2734_WP_Breadcrumbs
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-breadcrumbs/src/wp-breadcrumbs.php' ) );

/**
 * - Sets up the hooked functions
 * - Sets up the custom template tags
 */
$includes = array(
	'/app/config',
	'/app/controller',
	'/app/setup',
	'/app/customizer',
	'/app/template-tags',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( __DIR__, '', $file );
		require_once( get_theme_file_path( $template_name ) );
	}
}

/**
 * Activate Inc2734_WP_Share_Buttons
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-share-buttons/src/wp-share-buttons.php' ) );
new Inc2734_WP_Share_Buttons();
