<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'wp_link_pages_link', function( $link ) {
	$link = preg_replace( '/^(\d+)$/', '<span class="page-numbers current">$1</span>', $link );
	$link = preg_replace( '/^<a([^>]+)>(\d+?)<\/a>$/', '<a class="page-numbers" $1>$2</a>', $link );
	$link .= "\n";
	return $link;
} );

wp_link_pages( [
	'before'           => '<div class="_p-pagination"><h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'mimizuku' ) . '</h2><div class="nav-links">',
	'after'            => '</div></div>',
	'link_before'      => '',
	'link_after'       => '',
	'separator'        => '',
	'nextpagelink'     => '&gt;',
	'previouspagelink' => '%lt;',
	'pagelink'         => '%',
] );
