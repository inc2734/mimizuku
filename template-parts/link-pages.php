<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

add_filter( 'wp_link_pages_link', function( $pagination ) {
	$pagination = preg_replace(
		'/^(\d+)$/',
		'<span class="page-numbers current">$1</span>',
		$pagination
	);
	$pagination = preg_replace(
		'/^<a([^>]+)>(\d+?)<\/a>$/',
		'<a class="page-numbers" $1>$2</a>',
		$pagination
	);
	$pagination = \Mimizuku\App\Models\Pagination::replace_basis_pager_structure( $pagination );
	$pagination .= "\n";

	return $pagination;
} );

wp_link_pages( [
	'before'           => '<div class="_c-pagination"><h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'mimizuku' ) . '</h2><div class="nav-links">',
	'after'            => '</div></div>',
	'link_before'      => '',
	'link_after'       => '',
	'separator'        => '',
	'nextpagelink'     => '&gt;',
	'previouspagelink' => '%lt;',
	'pagelink'         => '%',
] );
