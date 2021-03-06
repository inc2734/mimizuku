<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'select', 'mwt-share-buttons-type', [
	'type'     => 'option',
	'label'    => __( 'Type', 'mimizuku' ),
	'priority' => 110,
	'default'  => 'balloon',
	'choices'  => [
		'balloon'    => __( 'Balloon', 'mimizuku' ),
		'horizontal' => __( 'Horizontal', 'mimizuku' ),
		'icon'       => __( 'Icon', 'mimizuku' ),
		'block'      => __( 'Block', 'mimizuku' ),
		'official'   => __( 'Official', 'mimizuku' ),
	],
] );

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'seo-sns' );
$section = $customizer->get_section( 'share-buttons' );
$control = $customizer->get_control( 'mwt-share-buttons-type' );
$control->join( $section )->join( $panel );
