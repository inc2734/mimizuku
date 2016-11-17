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
<div class="_l-container _p-drawer" data-bs-layout="container" data-bs-container-layout="sticky-footer" data-bs-component="drawer">
	<?php get_template_part( 'template-parts/drawer-nav' ); ?>
	<?php get_header(); ?>

	<div class="_l-contents" role="document" data-bs-layout="contents">
		<main class="_l-main" role="main">
			<?php $this->view(); ?>
		</main>
	</div>

	<?php get_footer(); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
