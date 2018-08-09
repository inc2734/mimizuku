<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'select', 'header-layout', [
	'transport' => 'postMessage',
	'label'     => __( 'Header layout', 'mimizuku' ),
	'priority'  => 100,
	'default'   => 'center',
	'choices'   => [
		'simple' => __( 'Simple', 'mimizuku' ),
		'1row'   => __( 'One row', 'mimizuku' ),
		'2row'   => __( 'Two rows', 'mimizuku' ),
		'center' => __( 'Center logo', 'mimizuku' ),
	],
] );

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'layout' );
$section = $customizer->get_section( 'header' );
$control = $customizer->get_control( 'header-layout' );
$control->join( $section )->join( $panel );
$control->partial( [
	'selector'        => '.l-header',
	'render_callback' => function() {
		get_template_part( 'template-parts/' . get_theme_mod( 'header-layout' ) . '-header' );
	},
] );
