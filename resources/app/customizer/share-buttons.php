<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->section( 'share-buttons', [
	'title' => __( 'Share buttons', 'mimizuku' ),
	'description' => sprintf(
		__( 'If you want to count of tweet then needs to register to %1$s.', 'mimizuku' ),
		'<a href="https://opensharecount.com/" target="_blank">OpenShareCount</a>'
	),
] );

$customizer->control( 'multiple-checkbox', 'share-buttons-buttons', [
	'label'   => __( 'Display buttons', 'mimizuku' ),
	'default' => '',
	'choices' => [
		'facebook' => __( 'Facebook', 'mimizuku' ),
		'twitter'  => __( 'Twitter', 'mimizuku' ),
		'hatena'   => __( 'Hatena Bookmark', 'mimizuku' ),
		'feedly'   => __( 'Feedly', 'mimizuku' ),
		'line'     => __( 'LINE', 'mimizuku' ),
		'pocket'   => __( 'Pocket', 'mimizuku' ),
		'feed'     => __( 'Feed', 'mimizuku' ),
	],
] );

$customizer->control( 'select', 'share-buttons-type', [
	'label'   => __( 'Type', 'mimizuku' ),
	'default' => 'balloon',
	'choices' => [
		'balloon'    => __( 'Balloon', 'mimizuku' ),
		'horizontal' => __( 'Horizontal', 'mimizuku' ),
		'icon'       => __( 'Icon', 'mimizuku' ),
		'block'      => __( 'Block', 'mimizuku' ),
		'official'   => __( 'Official', 'mimizuku' ),
	],
] );

$customizer->control( 'select', 'share-buttons-display-position', [
	'label'   => __( 'Display position', 'mimizuku' ),
	'default' => 'top',
	'choices' => [
		'top'    => __( 'Top of contents', 'mimizuku' ),
		'bottom' => __( 'Bottom of contents', 'mimizuku' ),
		'both'   => __( 'Both', 'mimizuku' ),
	],
] );

$customizer->control( 'text', 'share-buttons-cache-seconds', [
	'label'   => __( 'Share counts cache time (seconds)', 'mimizuku' ),
	'default' => 300,
] );

$section = $customizer->get_section( 'share-buttons' );
$control = $customizer->get_control( 'share-buttons-buttons' );
$control->join( $section );
$control = $customizer->get_control( 'share-buttons-type' );
$control->join( $section );
$control = $customizer->get_control( 'share-buttons-display-position' );
$control->join( $section );
$control = $customizer->get_control( 'share-buttons-cache-seconds' );
$control->join( $section );
