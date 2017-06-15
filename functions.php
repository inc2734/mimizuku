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
 * - Sets up the hooked functions
 * - Sets up the custom template tags
 */
$includes = array(
	'/app/config',
	'/app/controller',
	'/app/model',
	'/app/view',
	'/app/setup',
	'/app/template-tags',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		require_once( $file );
	}
}
