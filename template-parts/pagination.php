<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

global $wp_query;

if ( empty( $wp_query->max_num_pages ) || $wp_query->max_num_pages < 2 ) {
	return;
}

wpbasis_the_posts_pagination();
