<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();

$customizer->control( 'select', 'mwt-share-buttons-count-both', [
	'type'     => 'option',
	'label'    => __( 'Count both http and https', 'mimizuku' ),
	'description' => __( 'In the case of the http site, only http will be counted regardless of the setting.', 'mimizuku' ),
	'priority' => 140,
	'default'  => true,
] );

if ( ! is_customize_preview() ) {
	return;
}

$panel   = $customizer->get_panel( 'seo-sns' );
$section = $customizer->get_section( 'share-buttons' );
$control = $customizer->get_control( 'mwt-share-buttons-count-both' );
$control->join( $section );
