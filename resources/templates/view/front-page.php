<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<article <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/front-page-top-widget-area' ); ?>

	<?php the_content(); ?>

	<?php get_template_part( 'template-parts/front-page-bottom-widget-area' ); ?>
</article>
