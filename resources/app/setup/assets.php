<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Enqueue main style
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	$relative_path = '/assets/css/style.min.css';
	$src  = get_theme_file_uri( $relative_path );
	$path = get_theme_file_path( $relative_path );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_style(
		mimizuku_get_main_style_handle(),
		$src,
		[],
		filemtime( $path )
	);
} );

/**
 * Enqueue main script
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	$relative_path = '/assets/js/app.js';
	$src  = get_theme_file_uri( $relative_path );
	$path = get_theme_file_path( $relative_path );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_script(
		mimizuku_get_main_script_handle(),
		$src,
		[ 'jquery' ],
		filemtime( $path ),
		true
	);
} );

/**
 * Enqueue FontAwesome
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script(
		'fontawesome5',
		'https://use.fontawesome.com/releases/v5.0.9/js/all.js',
		[ mimizuku_get_main_script_handle() ],
		'5.0.9',
		true
	);

	wp_enqueue_script(
		'fontawesome5-v4-shims',
		'https://use.fontawesome.com/releases/v5.0.9/js/v4-shims.js',
		[ 'fontawesome5' ],
		'5.0.9',
		true
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
 * Enqueue script for customize preview
 *
 * @return void
 */
add_action( 'customize_preview_init', function() {
	$relative_path = '/assets/js/customize-preview.js';
	$src  = get_theme_file_uri( $relative_path );
	$path = get_theme_file_path( $relative_path );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_script(
		mimizuku_get_main_script_handle() . '-customize-preview',
		$src,
		[ 'jquery', 'customize-preview', mimizuku_get_main_script_handle() ],
		filemtime( $path ),
		true
	);
} );

/**
 * Enqueue Woocommerce style
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( ! class_exists( 'woocommerce' ) ) {
		return;
	}

	$relative_path = '/assets/css/woocommerce.min.css';
	$src  = get_theme_file_uri( $relative_path );
	$path = get_theme_file_path( $relative_path );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_style(
		mimizuku_get_main_style_handle() . '-woocommerce',
		$src,
		[ mimizuku_get_main_style_handle() ],
		filemtime( $path )
	);
} );

/**
 * Enqueue Elementor style
 *
 * @return void
 */
add_action( 'wp_enqueue_scripts', function() {
	if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
		return;
	}

	$relative_path = '/assets/css/dependency/elementor/elementor.min.css';
	$src  = get_theme_file_uri( $relative_path );
	$path = get_theme_file_path( $relative_path );

	if ( ! file_exists( $path ) ) {
		return;
	}

	wp_enqueue_style(
		mimizuku_get_main_style_handle() . '-elementor',
		$src,
		[ mimizuku_get_main_style_handle() ],
		filemtime( $path )
	);
} );
