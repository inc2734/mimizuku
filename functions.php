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
 * Sets up nav menus
 */
get_template_part( 'functions/setup-nav-menus' );

/**
 * Sets up widget areas
 */
get_template_part( 'functions/widgets-init' );

/**
 * Sets up post class
 */
get_template_part( 'functions/setup-post-class' );

/**
 * Sets up TinyMCE
 */
get_template_part( 'functions/setup-tinymce' );

/**
 * Sets up comment form
 */
get_template_part( 'functions/setup-comment-form' );

/**
 * Enqueues scripts and styles.
 */
get_template_part( 'functions/enqueue-scripts' );

/**
 * Setup head content
 */
get_template_part( 'functions/setup-head' );
