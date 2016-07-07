<div class="_c-container">
	<ul>
		<?php while ( have_posts() ) : the_post(); ?>
		<li><?php get_template_part( 'template-parts/content/content' ); ?></li>
		<?php endwhile; ?>
	</ul>

	<?php get_template_part( 'template-parts/pagination' ); ?>
</div>
