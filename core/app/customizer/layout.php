<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$customizer = Inc2734_WP_Customizer_Framework::init();

$customizer->section( 'layout', [
	'title' => __( 'Layout', 'mimizuku' ),
] );

$customizer->control( 'select', 'basic-layout', [
	'label'   => __( 'Basic layout', 'mimizuku' ),
	'default' => 'right-sidebar',
	'choices' => [
		'left-sidebar'     => __( 'Left sidebar', 'mimizuku' ),
		'right-sidebar'    => __( 'Right sidebar', 'mimizuku' ),
		'one-column'       => __( 'One column', 'mimizuku' ),
		'one-column-fluid' => __( 'One column (fluid)', 'mimizuku' ),
		'one-column-slim'  => __( 'One column (slim)', 'mimizuku' ),
	],
] );

$customizer->control( 'select', 'header-layout', [
	'label'   => __( 'Header layout', 'mimizuku' ),
	'default' => '2row',
	'choices' => [
		'simple' => __( 'Simple', 'mimizuku' ),
		'1row'   => __( 'One row', 'mimizuku' ),
		'2row'   => __( 'Two rows', 'mimizuku' ),
		'center' => __( 'Center logo', 'mimizuku' ),
	],
] );

$customizer->control( 'select', 'footer-widget-area-column-size', [
	'label'   => __( 'Number of columns in the footer widget aera', 'mimizuku' ),
	'default' => '1-3',
	'choices' => [
		'1-1' => __( '1 column', 'mimizuku' ),
		'1-2' => __( '2 columns', 'mimizuku' ),
		'1-3' => __( '3 columns', 'mimizuku' ),
		'1-4' => __( '4 columns', 'mimizuku' ),
	],
] );

$section = $customizer->get_section( 'layout' );
$control = $customizer->get_control( 'basic-layout' );
$control->join( $section );

$control = $customizer->get_control( 'header-layout' );
$control->join( $section );

$control = $customizer->get_control( 'footer-widget-area-column-size' );
$control->join( $section );


add_action( 'wp_head', function() {
	$footer_widgets_area_size = get_theme_mod( 'footer-widget-area-column-size' );
	$footer_widgets_area_size = explode( '-', $footer_widgets_area_size );
	$footer_widgets_area_size = $footer_widgets_area_size[0] / $footer_widgets_area_size[1] * 100;
	?>
<style>
.l-footer-widget-area__item { -ms-flex: 0 1 <?php echo esc_html( $footer_widgets_area_size ); ?>%; flex: 0 1 <?php echo esc_html( $footer_widgets_area_size ); ?>%; max-width: <?php echo esc_html( $footer_widgets_area_size ); ?>%; }
</style>
	<?php
} );
