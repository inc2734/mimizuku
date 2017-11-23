<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<article <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<header class="c-entry__header">
		<h1 class="c-entry__title" itemprop="name"><?php the_title(); ?></h1>
	</header>

	<div class="c-entry__content" itemprop="articleBody">
		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>
	</div>
</article>

<?php get_template_part( 'template-parts/contents-bottom-widget-area' ); ?>

<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '', true );
}
