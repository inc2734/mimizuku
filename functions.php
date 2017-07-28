<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Make theme available for translation
 *
 * @return void
 */
load_theme_textdomain( 'mimizuku', get_template_directory() . '/resources/languages' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'mimizuku_content_width', 1152 );
}

/**
 * Update view controller config
 *
 * @param array $config
 * @return array
 */
add_filter( 'inc2734_view_controller_config', function( $config ) {
	return [
		'templates' => 'resources/templates',
		'layout'    => 'resources/templates/layout/wrapper',
		'header'    => 'resources/templates/layout/header',
		'sidebar'   => 'resources/templates/layout/sidebar',
		'footer'    => 'resources/templates/layout/footer',
		'view'      => 'resources/templates/view',
		'static'    => 'resources/templates/view/static',
	];
} );

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
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = str_replace( array( trailingslashit( __DIR__ ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}
