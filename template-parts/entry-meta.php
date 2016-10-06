<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$entry_meta = [];

/**
 * Published
 */
$entry_meta['published'] = sprintf(
	'<time datetime="%s">
		<span class="screen-reader-text">%s</span>
		%s
	</time>',
	esc_attr( get_the_date( 'c' ) ),
	esc_html__( 'Published', 'mimizuku' ),
	esc_html( get_the_date() )
);

/**
 * Author
 */
$entry_meta['author'] = sprintf(
	'<span class="screen-reader-text">%s</span>
	<i class="fa fa-user"></i>
	<a href="%s">%s</a>',
	esc_html__( 'Author', 'habakiri' ),
	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	esc_html( get_the_author() )
);

/**
 * Categories
 */
$categories = get_the_terms( get_the_ID(), 'category' );
if ( $categories ) {
	$entry_meta['categories'] = sprintf(
		'<span class="screen-reader-text">%s</span>
		<i class="fa fa-folder"></i>
		<a href="%s">%s</a>',
		esc_html__( 'Categories', 'mimizuku' ),
		esc_url( get_term_link( $categories[0] ) ),
		esc_html( $categories[0]->name )
	);
}

/**
 * Tags
 */
$tags = get_the_tag_list( '', ', ' );
if ( $tags ) {
	$entry_meta['tags'] = sprintf(
		'<span class="screen-reader-text">%s</span>
		<i class="fa fa-tags"></i>
		%s',
		esc_html__( 'Tags', 'mimizuku' ),
		get_the_tag_list( '', ', ' )
	);
}

$entry_meta = apply_filters( 'mimizuku_entry_meta_items', $entry_meta );
?>
<div class="_p-entry-meta">
	<ul class="_p-entry-meta__list">
		<?php foreach ( $entry_meta as $key => $item ) : ?>
		<li class="_p-entry-meta__item _p-entry-meta__item--<?php echo esc_attr( $key ); ?>">
			<?php echo wp_kses_post( $item ); ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
