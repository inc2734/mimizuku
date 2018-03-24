<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$panel      = $customizer->get_panel( 'seo-sns' );
$section    = $customizer->get_section( 'ogp' );

$customizer->control( 'image', 'mwt-default-og-image', array(
	'label'       => __( 'Default OGP image', 'mimizuku' ),
	'description' => __( 'If a featured image is set in an article, that the featured image is used, if not set, this image will be used.', 'mimizuku' ),
	'priority'    => 110,
	'type'        => 'option',
) );

$control = $customizer->get_control( 'mwt-default-og-image' );
$control->join( $section )->join( $panel );
