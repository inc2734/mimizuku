<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<section <?php post_class(); ?>>
	<header class="_c-entry__header">
		<h2 class="_c-entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'template-parts/entry-meta' ); ?>
	</header>
	<div class="_c-entry__content">
		<?php the_excerpt(); ?>
	</div>
</section>
