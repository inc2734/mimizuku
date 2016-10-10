<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\Assets;

/**
 * Enqueues scripts
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	$url     = get_template_directory_uri();
	$version = _get_theme_version();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		get_template(),
		$url . '/assets/js/app.min.js',
		[ 'jquery' ],
		$version,
		true
	);

	if ( \Mimizuku\App\Tags\is_supported_ie9() ) {
		wp_enqueue_script(
			'html5shiv',
			$url . '/assets/vendor/html5.js'
		);
		wp_script_add_data(
			'html5shiv',
			'conditional',
			'lt IE 9'
		);
	}
} );

/**
 * Enqueues styles
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
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
		$url . '/assets/vendor/font-awesome/css/font-awesome.min.css',
		[],
		$version
	);

	if ( \Mimizuku\App\Tags\is_supported_ie9() ) {
		wp_enqueue_style(
			'basis-ie9',
			$url . '/assets/vendor/basis-ie9/basis-ie9.min.css',
			[ $handle ],
			$version
		);
		wp_style_add_data(
			'basis-ie9',
			'conditional', 'lt IE 10'
		);
	}
} );

/**
 * Return the theme version
 *
 * @return string
 */
function _get_theme_version() {
	$theme = wp_get_theme();
	return $theme->get( 'Version' );
}
