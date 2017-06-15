<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<article <?php post_class(); ?>>
	<header class="_c-entry__header">
		<h1 class="_c-entry__title"><?php the_title(); ?></h1>
	</header>

	<div class="_c-entry__content">
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>
</article>

<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '', true );
}
