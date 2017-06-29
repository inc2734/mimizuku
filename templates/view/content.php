<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<article <?php post_class(); ?>>
	<header class="c-entry__header">
		<h1 class="c-entry__title"><?php the_title(); ?></h1>
		<div class="c-entry__meta">
			<?php get_template_part( 'template-parts/entry-meta' ); ?>
		</div>
	</header>

	<div class="c-entry__content">
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>
</article>

<?php
comments_template( '', true );
