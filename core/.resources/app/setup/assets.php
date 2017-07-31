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
	$src  = get_theme_file_uri( '/resources/assets/css/style.min.css' );
	$path = get_theme_file_path( '/resources/assets/css/style.min.css' );

	wp_enqueue_style(
		get_stylesheet(),
		$src,
		[],
		filemtime( $path )
	);
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
	$src  = get_theme_file_uri( '/resources/assets/js/app.min.js' );
	$path = get_theme_file_path( '/resources/assets/js/app.min.js' );

	wp_enqueue_script(
		get_stylesheet(),
		$src,
		[ 'jquery' ],
		$path,
		true
	);
} );
