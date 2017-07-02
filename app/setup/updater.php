<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_GitHub_Theme_Updater' ) ) {
	include_once( get_theme_file_path( '/vendor/inc2734/wp-github-theme-updater/src/wp-github-theme-updater.php' ) );
}

new Inc2734_WP_GitHub_Theme_Updater( get_stylesheet(), 'inc2734', 'mimizuku', [
	'homepage' => 'https://github.com/inc2734/mimizuku',
] );
