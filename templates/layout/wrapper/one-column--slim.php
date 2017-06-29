<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> data-sticky-footer="true">
<?php get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>

	<?php get_template_part( 'template-parts/drawer-nav' ); ?>
	<div class="l-container">
		<?php get_header(); ?>

		<div class="l-contents" role="document">
			<div class="c-container">
				<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

				<div class="c-row c-row--margin">
					<div class="c-row__col c-row__col--1-1 c-row__col--md-8-10 c-row__col--md-offset-1-10 c-row__col--lg-4-6 c-row__col--lg-offset-1-6">
						<main class="l-main" role="main">
							<?php $_View_Controller->view(); ?>
						</main>
					</div>

					<div class="c-row__col c-row__col--1-1 c-row__col--md-8-10 c-row__col--md-offset-1-10 c-row__col--lg-4-6 c-row__col--lg-offset-1-6">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php get_footer(); ?>
	</div>

<?php wp_footer(); ?>
</body>
</html>
