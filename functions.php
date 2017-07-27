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
 * Include composer packages
 */
include_once( get_theme_file_path( '/vendor/inc2734/wp-customizer-framework/src/wp-customizer-framework.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-basis/src/wp-basis.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-oembed-blog-card/src/wp-oembed-blog-card.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-breadcrumbs/src/wp-breadcrumbs.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-view-controller/src/wp-view-controller.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-share-buttons/src/wp-share-buttons.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-seo/src/wp-seo.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-like-me-box/src/wp-like-me-box.php' ) );
include_once( get_theme_file_path( '/vendor/inc2734/wp-pure-css-gallery/src/wp-pure-css-gallery.php' ) );

new Inc2734_WP_Basis();
new Inc2734_WP_oEmbed_Blog_Card();
new Inc2734_WP_Share_Buttons();
new Inc2734_WP_SEO();
new Inc2734_WP_Like_Me_Box();
new Inc2734_WP_Pure_CSS_Gallery();

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
