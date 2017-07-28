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
			<?php get_template_part( 'resources/template-parts/entry-meta' ); ?>
		</div>
	</header>

	<div class="c-entry__content">
		<?php
		$share_buttons_display_position = get_theme_mod( 'share-buttons-display-position' );
		if ( 'top' === $share_buttons_display_position || 'both' === $share_buttons_display_position ) {
			get_template_part( 'resources/template-parts/share-buttons' );
		}
		?>

		<?php the_content(); ?>
		<?php get_template_part( 'resources/template-parts/link-pages' ); ?>

		<?php
		if ( 'bottom' === $share_buttons_display_position || 'both' === $share_buttons_display_position ) {
			get_template_part( 'resources/template-parts/share-buttons' );
		}
		?>

		<?php get_template_part( 'resources/template-parts/like-me-box' ); ?>
	</div>
</article>

<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '/' . wpvc_config( 'templates' ) . '/comments.php', true );
}
