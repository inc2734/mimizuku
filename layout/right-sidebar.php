<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>

<?php get_header(); ?>

<div class="_c-container" role="document">
	<div class="_c-row">
		<div class="_c-row__col _c-row__col--md-3-4">
			<main role="main">
				<?php Mimizuku\Controller::load_view(); ?>
			</main>
		</div>

		<?php if ( Mimizuku\Tags\has_sidebar() ) : ?>
		<div class="_c-row__col _c-row__col--md-1-4">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
</body>
</html>
