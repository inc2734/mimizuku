<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>

<?php get_header(); ?>

<div class="_c-container" role="document">
	<div class="_c-row _c-row--reverse">
		<div class="_c-row__col _c-row__col--md-3-4">
			<main role="main">
				<?php Mimizuku\Controller::load_view(); ?>
			</main>
		</div>
		<div class="_c-row__col _c-row__col--md-1-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
