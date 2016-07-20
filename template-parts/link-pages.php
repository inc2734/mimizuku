<?php
wp_link_pages( [
	'before'           => '<div class="_c-pagination"><h2 class="screen-reader-text">' . esc_html__( 'Posts navigation', 'mimizuku' ) . '</h2><div class="nav-links">',
	'after'            => '</div></div>',
	'link_before'      => '',
	'link_after'       => '',
	'separator'        => '',
	'nextpagelink'     => '&gt;',
	'previouspagelink' => '%lt;',
	'pagelink'         => '<span>%</span>',
] );
