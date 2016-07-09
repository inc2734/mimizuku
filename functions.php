<?php
include_once( get_template_directory() . '/classes/controllers/controller.php' );
include_once( get_template_directory() . '/template-tags/loader.php' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'mimizuku_content_width', 1152 );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
get_template_part( 'functions/setup' );

/**
 * Sets up widget areas
 */
get_template_part( 'functions/widgets-init' );

/**
 * Enqueues scripts and styles.
 */
get_template_part( 'functions/enqueue-scripts' );
