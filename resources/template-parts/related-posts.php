<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$related_posts_query = mimizuku_get_related_posts( get_the_ID() );

if ( ! $related_posts_query->have_posts() ) {
	return;
}
?>
<aside class="p-related-posts c-entry-aside">
	<h2 class="p-related-posts__title c-entry-aside__title"><?php esc_html_e( 'Related posts', 'mimizuku' ); ?></h2>
	<ul class="c-entries">
		<?php while ( $related_posts_query->have_posts() ) : ?>
			<?php $related_posts_query->the_post(); ?>
			<li class="c-entries__item">
				<?php get_template_part( 'template-parts/entry-summary' ); ?>
			</li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</aside>
