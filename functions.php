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
 * - Loads composer packages
 * - Sets up the hooked functions
 * - Sets up the customizer
 * - Sets up the custom template tags
 */
$includes = array(
	'/app/composer-packages',
	'/app/controller',
	'/app/setup',
	'/app/customizer',
	'/app/template-tags',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( array( trailingslashit( __DIR__ ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}
