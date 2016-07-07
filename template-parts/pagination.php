<?php
global $wp_rewrite, $wp_query, $paged;

$paginate_base = get_pagenum_link( 1 );

if ( strpos( $paginate_base, '?' ) || ! $wp_rewrite->using_permalinks() ) {
	$paginate_format = '';
	$paginate_base = add_query_arg( 'paged', '%#%' );
} else {
	$paginate_format = ( substr( $paginate_base, -1 ,1 ) == '/' ? '' : '/' ) .
	user_trailingslashit( 'page/%#%/', 'paged' );
	$paginate_base .= '%_%';
}

$pagination_args = apply_filters( 'mimizuku_pagination_args', [
	'mid_size'  => 1,
	'prev_text' => '&lt;',
	'next_text' => '&gt;',
] );

$paginate_links = paginate_links( array_merge( $pagination_args, [
	'base'    => $paginate_base,
	'format'  => $paginate_format,
	'total'   => $wp_query->max_num_pages,
	'current' => ( $paged ? $paged : 1 ),
	'type'    => 'array',
] ) );

if ( ! $paginate_links ) {
	return;
}
?>
<div class="p-pagination">
	<ul class="p-pagination__list">
		<?php foreach ( $paginate_links as $link ) : ?>
		<li class="p-pagination__item">
			<?php
			echo wp_kses(
				$link,
				[
					'a' => [
						'href'  => [],
						'class' => [],
					],
					'span' => [
						'class' => [],
					]
				]
			);
			?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
