<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_Pure_CSS_Gallery' ) ) {
	include_once( get_template_directory() . '/../vendor/inc2734/wp-pure-css-gallery/src/wp-pure-css-gallery.php' );
}

new Inc2734_WP_Pure_CSS_Gallery();
