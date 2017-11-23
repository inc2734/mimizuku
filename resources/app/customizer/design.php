<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->section( 'design', [
	'title' => __( 'Design', 'mimizuku' ),
] );

$section = $customizer->get_section( 'design' );

/**
 * Layout
 */
$customizer->control( 'select', 'layout', [
	'label'   =>  __( 'Page layout', 'mimizuku' ),
	'default' => 'right-sidebar',
	'choices' => mimizuku_get_page_templates(),
] );

$control = $customizer->get_control( 'layout' );
$control->join( $section );

/**
 * Header layout
 */
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

$control = $customizer->get_control( 'header-layout' );
$control->join( $section );

/**
 * Footer layout
 */
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

$control = $customizer->get_control( 'footer-widget-area-column-size' );
$control->join( $section );
