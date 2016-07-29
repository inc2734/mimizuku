<ul class="_p-entries">
	<?php while ( have_posts() ) : the_post(); ?>
	<li class="_p-entries__item">
		<?php Mimizuku\Tags\get_entries_item_template(); ?>
	</li>
	<?php endwhile; ?>
</ul>

<?php get_template_part( 'template-parts/pagination' ); ?>
