<article <?php post_class(); ?>>
	<header class="_c-entry__header">
		<h1 class="_c-entry__title"><?php the_title(); ?></h1>
		<?php get_template_part( 'template-parts/entry-meta' ); ?>
	</header>

	<div class="_c-entry__content">
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>

	<?php
	if ( comments_open() || pings_open() || get_comments_number() ) {
		comments_template( '', true );
	}
	?>
</article>
