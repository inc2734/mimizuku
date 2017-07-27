<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_Like_Me_Box' ) ) {
	include_once( get_theme_file_path( '/vendor/inc2734/wp-like-me-box/src/wp-like-me-box.php' ) );
}

new Inc2734_WP_Like_Me_Box();
