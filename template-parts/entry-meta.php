<?php
$entry_meta = [];

// Published
$entry_meta['published'] = sprintf(
	'<time datetime="%s">
		<span class="screen-reader-text">%s</span>
		%s
	</time>',
	esc_attr( get_the_date( 'c' ) ),
	esc_html__( 'Published', 'mimizuku' ),
	esc_html( get_the_date() )
);

// Author
$entry_meta['author'] = sprintf(
	'<span class="screen-reader-text">%s</span>
	<i class="fa fa-user"></i>
	<a href="%s">%s</a>',
	esc_html__( 'Author', 'habakiri' ),
	esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	esc_html( get_the_author() )
);

// Categories
$categories = get_the_category_list( ', ' );
if ( $categories ) {
	$entry_meta['categories'] = sprintf(
		'<span class="screen-reader-text">%s</span>
		<i class="fa fa-folder"></i>
		%s',
		esc_html__( 'Categories', 'mimizuku' ),
		get_the_category_list( ', ' )
	);
}

// Tags
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
<div class="_c-entry-meta">
	<ul class="_c-entry-meta__list">
		<?php foreach ( $entry_meta as $key => $item ) : ?>
		<li class="_c-entry-meta__item _c-entry-meta__item--<?php echo esc_attr( $key ); ?>">
			<?php echo wp_kses( $item, wp_kses_allowed_html( 'post' ) ); ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
