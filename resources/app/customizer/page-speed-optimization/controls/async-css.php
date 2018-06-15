<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$section    = $customizer->get_section( 'page-speed-optimization' );

$customizer->control( 'checkbox', 'async-css', [
	'label'    => __( 'Loads CSS asynchronously', 'mimizuku' ),
	'priority' => 120,
	'default'  => false,
] );

$control = $customizer->get_control( 'async-css' );
$control->join( $section );
