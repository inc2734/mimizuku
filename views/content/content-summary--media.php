<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section <?php post_class( [ '_p-entry-summary', '_p-entry-summary--media' ] ); ?>>
	<?php $thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ); ?>
	<div class="_p-entry-summary__figure"
		<?php if ( $thumbnail_url ) : ?>
		style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"
		<?php endif; ?>
	></div>
	<div class="_p-entry-summary__body">
		<h1 class="_p-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php get_template_part( 'template-parts/entry-meta' ); ?>
		<div class="_p-entry-summary__content">
			<?php the_excerpt(); ?>
		</div>
	</div>
</section>
