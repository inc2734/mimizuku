<section class="_c-entry-summary _c-entry-summary--media">
	<div class="_c-flex-media">
		<?php $thumbnail_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium' ); ?>
		<div class="_c-entry-summary__figure _c-flex-media__figure"
			<?php if ( $thumbnail_url ) : ?>
			style="background-image: url( <?php echo esc_url( $thumbnail_url ); ?> );"
			<?php endif; ?>
		></div>
		<div class="_c-flex-media__body">
			<h1 class="_c-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<?php get_template_part( 'template-parts/entry-meta' ); ?>
			<div class="_c-entry-summary__content">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
</section>
