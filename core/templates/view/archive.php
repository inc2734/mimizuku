<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<ul>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endwhile; ?>
</ul>

<?php the_posts_pagination(); ?>
