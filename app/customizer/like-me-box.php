<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$customizer = Inc2734_WP_Customizer_Framework::init();

$customizer->section( 'like-me-box', [
	'title' => __( 'Like me box', 'mimizuku' ),
] );

$customizer->control( 'text', 'facebook-page-name', [
	'label'       => __( 'Facebook page name', 'mimizuku' ),
	'description' => sprintf(
		_x( 'Please enter %1$s of %2$s', 'facebook-page-name', 'mimizuku' ),
		'<code>https://www.facebook.com/xxxxx</code>',
		'<code>xxxxx</code>'
	),
] );

$section = $customizer->get_section( 'like-me-box' );
$control = $customizer->get_control( 'facebook-page-name' );
$control->join( $section );
