<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section <?php post_class(); ?>>
	<div class="_c-flex-media">
		<?php $thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ); ?>
		<div class="_c-flex-media__figure"
			<?php if ( $thumbnail_url ) : ?>
			style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"
			<?php endif; ?>
		></div>
		<div class="_c-flex-media__body">
			<header class="_c-entry__header">
				<h2 class="_c-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php get_template_part( 'template-parts/entry-meta' ); ?>
			</header>
			<div class="_c-entry__content">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</section>
