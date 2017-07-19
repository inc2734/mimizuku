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
		<?php
		$share_buttons = get_theme_mod( 'share-buttons-buttons' );
		$share_buttons_display_position = get_theme_mod( 'share-buttons-display-position' );

		if ( $share_buttons ) {
			if ( 'top' === $share_buttons_display_position || 'both' === $share_buttons_display_position ) {
				get_template_part( 'template-parts/share-buttons' );
			}
		}
		?>

		<?php the_content(); ?>
		<?php get_template_part( 'template-parts/link-pages' ); ?>

		<?php
		if ( $share_buttons ) {
			if ( 'bottom' === $share_buttons_display_position || 'both' === $share_buttons_display_position ) {
				get_template_part( 'template-parts/share-buttons' );
			}
		}
		?>
	</div>
</article>

<?php
comments_template( '', true );
