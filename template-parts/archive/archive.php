<?php if ( have_posts() ) : ?>

	<ul>
		<?php while ( have_posts() ) : the_post(); ?>
		<li><?php get_template_part( 'template-parts/content/content', 'summary' ); ?></li>
		<?php endwhile; ?>
	</ul>

	<?php get_template_part( 'template-parts/pagination' ); ?>

<?php else : ?>

	<?php esc_html_e( 'No posts.', 'mimizuku' ); ?>

<?php endif; ?>
