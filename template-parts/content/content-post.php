<article <?php post_class(); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<div>
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>

	<?php
	if ( comments_open() || pings_open() || get_comments_number() ) {
		comments_template( '', true );
	}
	?>
</article>
