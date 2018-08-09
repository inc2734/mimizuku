<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'checkbox', 'js-loading-optimization', [
	'label'    => __( 'Optimize the Mimizuku JavaScript loading', 'mimizuku' ),
	'priority' => 100,
	'default'  => true,
] );

if ( ! is_customize_preview() ) {
	return;
}

$section = $customizer->get_section( 'page-speed-optimization' );
$control = $customizer->get_control( 'js-loading-optimization' );
$control->join( $section );
