<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<article <?php post_class(); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>

	<?php the_content(); ?>
	<?php wp_link_pages(); ?>
</article>

<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '', true );
}
