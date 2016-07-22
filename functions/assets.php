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
		['jquery'],
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

	if ( ! is_child_theme() ) {
		$handle = get_template();
		$src    = $url . '/style.min.css';
	} else {
		$handle = get_stylesheet();
		$src    = get_stylesheet_uri();
	}

	wp_enqueue_style(
		$handle,
		$src,
		[],
		$version
	);

	wp_enqueue_style(
		'font-awesome',
		$url . '/assets/css/font-awesome/css/font-awesome.min.css',
		[],
		$version
	);
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
