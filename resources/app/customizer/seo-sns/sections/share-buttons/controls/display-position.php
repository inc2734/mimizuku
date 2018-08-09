<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'select', 'mwt-share-buttons-display-position', [
	'type'     => 'option',
	'label'    => __( 'Display position', 'mimizuku' ),
	'priority' => 120,
	'default'  => 'top',
	'choices'  => [
		'top'    => __( 'Top of contents', 'mimizuku' ),
		'bottom' => __( 'Bottom of contents', 'mimizuku' ),
		'both'   => __( 'Both', 'mimizuku' ),
	],
] );

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'seo-sns' );
$section = $customizer->get_section( 'share-buttons' );
$control = $customizer->get_control( 'mwt-share-buttons-display-position' );
$control->join( $section );
