<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section class="c-entry-summary">
	<div class="c-flex-media">
		<?php $thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ); ?>
		<div class="c-flex-media__figure"
			<?php if ( $thumbnail_url ) : ?>
			style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"
			<?php endif; ?>
		></div>
		<div class="c-flex-media__body">
			<header class="c-entry-summary__header">
				<h2 class="c-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="c-entry-summary__meta">
					<?php get_template_part( 'template-parts/entry-meta' ); ?>
				</div>
			</header>
			<div class="c-entry-summary__content">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</section>
