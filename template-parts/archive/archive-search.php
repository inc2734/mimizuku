<?php if ( have_posts() ) : ?>

	<ul class="_p-entries">
		<?php while ( have_posts() ) : the_post(); ?>
		<li class="_p-entries__item"><?php get_template_part( 'template-parts/content/content', 'summary' ); ?></li>
		<?php endwhile; ?>
	</ul>

	<?php get_template_part( 'template-parts/pagination' ); ?>

<?php else : ?>

	<p>
		<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mimizuku' ); ?>
	</p>

	<?php get_search_form(); ?>

<?php endif; ?>
