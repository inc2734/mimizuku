<?php
namespace Mimizuku\Functions;

function enqueue_scripts() {
	$url     = get_template_directory_uri();
	$theme   = wp_get_theme();
	$version = $theme->get( 'Version' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style(
		get_template(),
		$url . '/style.min.css',
		array(),
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

	wp_enqueue_script(
		get_template(),
		$url . '/assets/js/app.min.js',
		array( 'jquery' ),
		$version,
		true
	);
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_scripts' );
