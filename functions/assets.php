<?php
namespace Mimizuku\Functions\Assets;

/**
 * Enqueues scripts
 *
 * @return void
 */
function enqueue_scripts() {
	$url     = get_template_directory_uri();
	$version = _get_theme_version();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		get_template(),
		$url . '/assets/js/app.min.js',
		array( 'jquery' ),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );

/**
 * Enqueues styles
 *
 * @return void
 */
function enqueue_styles() {
	$url     = get_template_directory_uri();
	$version = _get_theme_version();

	wp_enqueue_style(
		get_template(),
		$url . '/style.min.css',
		array(),
		$version
	);

	wp_enqueue_style(
		'font-awesome',
		$url . '/assets/css/font-awesome/css/font-awesome.min.css',
		[get_template()],
		$version
	);

	if ( is_child_theme() ) {
		wp_enqueue_style(
			get_stylesheet(),
			get_stylesheet_uri(),
			array( get_template() ),
			$version
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles' );

/**
 * Return the theme version
 *
 * @return string
 */
function _get_theme_version() {
	$theme = wp_get_theme();
	return $theme->get( 'Version' );
}
