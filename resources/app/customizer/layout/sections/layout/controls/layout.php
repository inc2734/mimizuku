<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'select', 'layout', [
	'label'   => __( 'Page layout', 'mimizuku' ),
	'default' => 'right-sidebar',
	'choices' => mimizuku_get_page_templates(),
] );

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'layout' );
$section = $customizer->get_section( 'layout' );
$control = $customizer->get_control( 'layout' );
$control->join( $section )->join( $panel );
