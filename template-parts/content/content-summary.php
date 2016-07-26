<section class="_c-entry-summary">
	<h1 class="_c-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	<?php get_template_part( 'template-parts/entry-meta' ); ?>
	<div class="_c-entry-summary__content">
		<?php the_excerpt(); ?>
	</div>
</section>
