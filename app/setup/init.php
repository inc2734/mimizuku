<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Init {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'load_theme_textdomain' ] );
		add_action( 'after_setup_theme', [ $this, 'activate_title_tag' ] );
		add_action( 'after_setup_theme', [ $this, 'activate_post_thumbnails' ] );
		add_action( 'after_setup_theme', [ $this, 'activate_html5' ] );
		add_action( 'after_setup_theme', [ $this, 'activate_feed' ] );
		add_action( 'after_setup_theme', [ $this, 'activate_editor_style' ] );
	}

	/**
	 * Make theme available for translation
	 *
	 * @return void
	 */
	public function load_theme_textdomain() {
		load_theme_textdomain( 'mimizuku', get_template_directory() . '/languages' );
	}

	/**
	 * Enable plugins to manage the document title
	 *
	 * @return void
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	 */
	public function activate_title_tag() {
		add_theme_support( 'title-tag' );
	}

	/**
	 * Enable post thumbnails
	 *
	 * @return void
	 * @see http://codex.wordpress.org/Post_Thumbnails
	 * @see http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	 * @see http://codex.wordpress.org/Function_Reference/add_image_size
	 */
	public function activate_post_thumbnails() {
		add_theme_support( 'post-thumbnails' );
	}

	/**
	 * Enable HTML5 markup support
	 *
	 * @return void
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 */
	public function activate_html5() {
		add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	}

	/**
	 * Add default posts and comments RSS feed links to head.
	 *
	 * @return void
	 */
	public function activate_feed() {
		add_theme_support( 'automatic-feed-links' );
	}

	/**
	 * Use main stylesheet for visual editor
	 *
	 * @return void
	 */
	public function activate_editor_style() {
		add_editor_style();
	}
}
