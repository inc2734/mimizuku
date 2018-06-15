<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->section( 'page-speed-optimization', [
	'title'       => __( 'Page speed optimization', 'mimizuku' ),
	'description' => __( 'This feature is a beta version.', 'mimizuku' ),
	'priority'    => 2000,
] );
