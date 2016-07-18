<?php
namespace Mimizuku\Functions;

function setup() {

	/**
	 * Make theme available for translation
	 */
	load_theme_textdomain( 'mimizuku', get_template_directory() . '/languages' );

	/**
	 * Enable plugins to manage the document title
	 *
	 * @see // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable post thumbnails
	 *
	 * http://codex.wordpress.org/Post_Thumbnails
	 * http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	 * http://codex.wordpress.org/Function_Reference/add_image_size
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable HTML5 markup support
	 *
	 * http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 */
	add_theme_support( 'html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form'] );

	/**
	 * Use main stylesheet for visual editor
	 */
	add_editor_style();

	/**
	 * Register wp_nav_menu() menus
	 *
	 * http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( [
		'global-nav' => esc_html__( 'Global Navigation (For PC)', 'mimizuku' ),
		'drawer-nav' => esc_html__( 'Drawer Navigation (For Mobile)', 'mimizuku' ),
		'footer-nav' => esc_html__( 'Footer Navigation', 'mimizuku' ),
	] );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
