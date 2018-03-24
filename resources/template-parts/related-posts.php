<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$related_posts = mimizuku_get_related_posts( get_the_ID() );

if ( ! $related_posts ) {
	return;
}
?>
<aside class="p-related-posts c-entry-aside">
	<h2 class="p-related-posts__title c-entry-aside__title"><span><?php esc_html_e( 'Related posts', 'mimizuku' ); ?></span></h2>
	<ul class="c-entries">
		<?php foreach ( $related_posts as $post ) : ?>
			<?php setup_postdata( $post ); ?>
			<li class="c-entries__item">
				<?php get_template_part( 'template-parts/entry-summary' ); ?>
			</li>
		<?php endforeach; ?>
		<?php wp_reset_postdata( $post ); ?>
	</ul>
</aside>
