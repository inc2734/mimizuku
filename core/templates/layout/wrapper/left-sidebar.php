<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-sticky-footer="true">
<?php get_template_part( 'resources/template-parts/head' ); ?>

<body <?php body_class(); ?>>

	<?php get_template_part( 'resources/template-parts/drawer-nav' ); ?>
	<div class="l-container">
		<?php wpvc_get_header(); ?>

		<div class="l-contents">
			<div class="c-container">
				<?php get_template_part( 'resources/template-parts/breadcrumbs' ); ?>

				<div class="c-row c-row--margin c-row--reverse">
					<div class="c-row__col c-row__col--1-1 c-row__col--lg-3-4">
						<main class="l-main" role="main">
							<?php $_view_controller->view(); ?>
						</main>
					</div>

					<div class="c-row__col c-row__col--1-1 c-row__col--lg-1-4">
						<?php wpvc_get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php wpvc_get_footer(); ?>
	</div>

<?php wp_footer(); ?>
</body>
</html>
