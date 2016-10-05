<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section class="_p-entry-summary">
	<div class="_p-entry-summary__body">
		<h1 class="_p-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php get_template_part( 'template-parts/entry-meta' ); ?>
		<div class="_p-entry-summary__content">
			<?php the_excerpt(); ?>
		</div>
	</div>
</section>
