<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part( 'template-parts/head' ); ?>

<body <?php body_class(); ?>>
<div class="_l-container _l-container--sticky-footer _p-drawer">
	<?php get_template_part( 'template-parts/drawer-nav' ); ?>
	<?php get_header(); ?>

	<div class="_l-contents" role="document">
		<div class="_c-container">
			<div class="_c-row _c-row--margin _c-row--reverse">
				<div class="_c-row__col _c-row__col--1-1 _c-row__col--lg-3-4">
					<main class="_l-main" role="main">
						<?php $this->view(); ?>
					</main>
				</div>

				<div class="_c-row__col _c-row__col--1-1 _c-row__col--lg-1-4">
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
