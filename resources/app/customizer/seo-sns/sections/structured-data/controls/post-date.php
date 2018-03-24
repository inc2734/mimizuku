<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$panel      = $customizer->get_panel( 'seo-sns' );
$section    = $customizer->get_section( 'json-ld' );

$customizer->control( 'radio', 'post-date', [
	'label'       => __( 'Date for the search engine', 'mimizuku' ),
	'description' => __( 'This feature is a beta version.', 'mimizuku' ),
	'priority'    => 110,
	'default'     => 'published-date',
	'choices'     => [
		'published-date' => __( 'Published date', 'mimizuku' ) . __( '(Display published date and modifiled date)', 'mimizuku' ),
		'modified-date'  => __( 'Modified date', 'mimizuku' ) . __( '(Only modified date displayed when updating post)', 'mimizuku' ),
	],
] );

$control = $customizer->get_control( 'post-date' );
$control->join( $section )->join( $panel );
