<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_oEmbed_Blog_Card' ) ) {
	include_once( get_template_directory() . '/../vendor/inc2734/wp-oembed-blog-card/src/wp-oembed-blog-card.php' );
}

new Inc2734_WP_oEmbed_Blog_Card();
