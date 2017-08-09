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
load_theme_textdomain( 'mimizuku', get_template_directory() . '/languages' );

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
		'templates' => [
			'../core',
		],
		'page-templates' => [
			'page-templates',
			'../core/page-templates',
		],
		'layout' => [
			'templates/layout/wrapper',
			'../core/templates/layout/wrapper',
		],
		'header' => [
			'templates/layout/header',
			'../core/templates/layout/header',
		],
		'sidebar' => [
			'templates/layout/sidebar',
			'../core/templates/layout/sidebar',
		],
		'footer' => [
			'templates/layout/footer',
			'../core/templates/layout/footer',
		],
		'view' => [
			'templates/view',
			'../core/templates/view',
		],
		'static' => [
			'templates/view/static',
		],
	];
} );

/**
 * - Loads composer packages
 * - Sets up the hooked functions
 * - Sets up the customizer
 * - Sets up the custom template tags
 */
$includes = array(
	'/composer-packages',
	'/controller',
	'/setup',
);
foreach ( $includes as $include ) {
	foreach ( glob( __DIR__ . $include . '/*.php' ) as $file ) {
		$template_name = '../core/app/' . str_replace( array( trailingslashit( __DIR__ ), '.php' ), '', $file );
		get_template_part( $template_name );
	}
}
