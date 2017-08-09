<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php get_template_part( '../core/template-parts/head' ); ?>

<body <?php body_class(); ?>>
<?php do_action( 'mimizuku_prepend_body' ); ?>

<?php wpvc_get_header(); ?>

<main role="main">
	<?php $_view_controller->view(); ?>
</main>

<?php wpvc_get_sidebar(); ?>

<?php wpvc_get_footer(); ?>

<?php wp_footer(); ?>
</body>
</html>
