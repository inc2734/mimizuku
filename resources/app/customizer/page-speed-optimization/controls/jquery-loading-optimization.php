<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'checkbox', 'jquery-loading-optimization', [
	'label'       => __( 'Optimize the jQuery loading', 'mimizuku' ),
	'description' => __( 'Depending on your plugins and child theme, JavaScript error may occur.', 'mimizuku' ),
	'priority'    => 105,
	'default'     => false,
] );

if ( ! is_customize_preview() ) {
	return;
}

$section = $customizer->get_section( 'page-speed-optimization' );
$control = $customizer->get_control( 'jquery-loading-optimization' );
$control->join( $section );
