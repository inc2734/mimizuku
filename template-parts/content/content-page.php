<article <?php post_class(); ?>>
	<header class="p-entry__header">
		<h1 class="p-entry__title"><?php the_title(); ?></h1>
	</header>

	<div class="p-entry__content">
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>

	<?php
	if ( comments_open() || pings_open() || get_comments_number() ) {
		comments_template( '', true );
	}
	?>
</article>
