<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section class="c-entry-summary">
	<header class="c-entry-summary__header">
		<h2 class="c-entry-summary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="c-entry-summary__meta">
			<?php get_template_part( 'template-parts/entry-meta' ); ?>
		</div>
	</header>
	<div class="c-entry-summary__content">
		<?php the_excerpt(); ?>
	</div>
</section>
