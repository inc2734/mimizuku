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
 * Loads the auto loader
 */
include_once( get_template_directory() . '/vendor/autoload.php' );
spl_autoload_register( function ( $class ) {
	$slug = preg_replace( '/^\\Mimizuku/', '', $class );
	$slug = str_replace( '\\', '/', $slug );
	$slug = str_replace( '_', '-', $slug );
	$slug = strtolower( $slug );
	$slug = trim( $slug, '/' );
	$path = get_template_directory() . '/' . $slug . '.php';
	if ( file_exists( $path ) ) {
		include_once( $path );
	}
} );

/**
 * Sets up the hooked functions
 */
include_once( get_template_directory() . '/app/setup/loader.php' );

/**
 * Sets up the custom template tags
 */
include_once( get_template_directory() . '/app/tags/loader.php' );
