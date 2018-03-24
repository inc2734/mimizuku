<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$panel      = $customizer->get_panel( 'seo-sns' );
$section    = $customizer->get_section( 'share-buttons' );

$customizer->control( 'multiple-checkbox', 'mwt-share-buttons-buttons', [
	'type'     => 'option',
	'label'    => __( 'Display buttons', 'mimizuku' ),
	'priority' => 100,
	'default'  => '',
	'choices'  => [
		'facebook' => __( 'Facebook', 'mimizuku' ),
		'twitter'  => __( 'Twitter', 'mimizuku' ),
		'hatena'   => __( 'Hatena Bookmark', 'mimizuku' ),
		'feedly'   => __( 'Feedly', 'mimizuku' ),
		'line'     => __( 'LINE', 'mimizuku' ),
		'pocket'   => __( 'Pocket', 'mimizuku' ),
		'feed'     => __( 'Feed', 'mimizuku' ),
	],
] );

$control = $customizer->get_control( 'mwt-share-buttons-buttons' );
$control->join( $section )->join( $panel );
