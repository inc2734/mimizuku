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
		'right-sidebar'    => __( 'Left sidebar', 'mimizuku' ),
		'left-sidebar'     => __( 'Right sidebar', 'mimizuku' ),
		'one-column'       => __( 'One column', 'mimizuku' ),
		'one-column-fluid' => __( 'One column (fluid)', 'mimizuku' ),
		'one-column-slim'  => __( 'One column (slim)', 'mimizuku' ),
	],
] );

$section = $customizer->get_section( 'layout' );
$control = $customizer->get_control( 'basic-layout' );
$control->join( $section );
