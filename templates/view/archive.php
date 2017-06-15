<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<ul class="_c-entries">
	<?php while ( have_posts() ) : the_post(); ?>
	<li class="_c-entries__item">
		<?php get_template_part( 'template-parts/entry-summary' ); ?>
	</li>
	<?php endwhile; ?>
</ul>

<?php get_template_part( 'template-parts/pagination' ); ?>
