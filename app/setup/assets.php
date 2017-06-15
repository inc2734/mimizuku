<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( is_child_theme() ) {
		$src = get_stylesheet_directory_uri() . '/assets/css/style.min.css';
	} else {
		$src = get_template_directory_uri() . '/assets/css/style.min.css';
	}

	wp_enqueue_style(
		get_stylesheet(),
		$src,
		[],
		mimizuku_get_theme_version()
	);
} );

/**
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( mimizuku_is_supported_ie9() ) {
		wp_enqueue_style(
			'basis-ie9',
			get_template_directory_uri() . '/assets/css/basis-ie9.min.css',
			[ get_stylesheet() ],
			mimizuku_get_theme_version()
		);
		wp_style_add_data(
			'basis-ie9',
			'conditional', 'lt IE 10'
		);
	}
} );

/**
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

/**
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( is_child_theme() ) {
		$src = get_stylesheet_directory_uri() . '/assets/js/app.min.js';
	} else {
		$src = get_template_directory_uri() . '/assets/js/app.min.js';
	}

	wp_enqueue_script(
		get_stylesheet(),
		$src,
		[ 'jquery' ],
		mimizuku_get_theme_version(),
		true
	);
} );

/**
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( ! mimizuku_is_supported_ie9() ) {
		return;
	}

	wp_enqueue_script(
		'html5shiv',
		get_template_directory_uri() . '/assets/packages/sass-basis/vendor/html5.js'
	);
	wp_script_add_data(
		'html5shiv',
		'conditional',
		'lt IE 9'
	);
} );

/**
 * Return the theme version
 *
 * @return string
 */
function mimizuku_get_theme_version() {
	$theme = wp_get_theme();
	if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
		return $theme->get( 'Version' ) . '.' . time();
	}
	return $theme->get( 'Version' );
}
