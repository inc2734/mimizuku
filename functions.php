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

/**
 * Sets up the hooked functions
 */
include_once( get_template_directory() . '/app/setup/loader.php' );

/**
 * Sets up the custom template tags
 */
include_once( get_template_directory() . '/app/tags/loader.php' );
