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
$post_types = get_post_types( [
	'public' => true,
] );
unset( $post_types['attachment'] );
foreach ( $post_types as $post_type ) {
	$post_type_object = get_post_type_object( $post_type );
	$customizer->control( 'select', $post_type_object->name . '-layout', [
		// @codingStandardsIgnoreStart
		'label'   => sprintf( __( '%1$s layout', 'mimizuku' ), __( $post_type_object->label ) ),
		// @codingStandardsIgnoreEnd
		'default' => 'right-sidebar',
		'choices' => [
			'left-sidebar'     => __( 'Left sidebar', 'mimizuku' ),
			'right-sidebar'    => __( 'Right sidebar', 'mimizuku' ),
			'one-column'       => __( 'One column', 'mimizuku' ),
			'one-column-fluid' => __( 'One column (fluid)', 'mimizuku' ),
			'one-column-slim'  => __( 'One column (slim)', 'mimizuku' ),
		],
	] );

	$control = $customizer->get_control( $post_type_object->name . '-layout' );
	$control->join( $section );
}

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

/**
 * Contents outline
 */
$customizer->control( 'checkbox', 'mwt-display-contents-outline', [
	'label' => __( 'Display contents outline in posts', 'mimizuku' ),
	'type'  => 'option',
] );

$section = $customizer->get_section( 'design' );
$control = $customizer->get_control( 'mwt-display-contents-outline' );
$control->join( $section );

/**
 * Profile Box
 */
$customizer->control( 'checkbox', 'mwt-display-profile-box', [
	'label' => __( 'Display profile box in posts', 'mimizuku' ),
	'type'  => 'option',
] );

$section = $customizer->get_section( 'design' );
$control = $customizer->get_control( 'mwt-display-profile-box' );
$control->join( $section );
