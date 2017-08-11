<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$theme_link = sprintf(
	'<a href="https://2inc.org" target="_blank">%s</a>',
	__( 'Monkey Wrench', 'mimizuku' )
);

$wordpress_link = sprintf(
	'<a href="https://wordpress.org/" target="_blank">%s</a>',
	__( 'WordPress', 'mimizuku' )
);

$theme_by   = sprintf( __( 'mimizuku theme by %s', 'mimizuku' ), $theme_link );
$powered_by = sprintf( __( 'Powered by %s', 'mimizuku' ), $wordpress_link );
$copyright  = $theme_by . ' ' . $powered_by;

$customizer = Customizer_Framework::init();

$customizer->section( 'copyright', [
	'title' => __( 'Copyright', 'mimizuku' ),
] );

$customizer->control( 'text', 'copyright', [
	'label'       => __( 'Copyright', 'mimizuku' ),
	'description' => __( 'HTML usable', 'mimizuku' ),
	'default'     => $copyright,
] );

$section = $customizer->get_section( 'copyright' );
$control = $customizer->get_control( 'copyright' );
$control->join( $section );
