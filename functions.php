<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'mimizuku_content_width', 1152 );
}

/**
 * Loads the view controller class
 */
include_once( get_template_directory() . '/classes/controllers/controller.php' );

/**
 * Loads the view class
 */
include_once( get_template_directory() . '/classes/views/view.php' );

/**
 * Sets up the hooked functions
 */
include_once( get_template_directory() . '/functions/loader.php' );

/**
 * Sets up the custom template tags
 */
include_once( get_template_directory() . '/template-tags/loader.php' );
