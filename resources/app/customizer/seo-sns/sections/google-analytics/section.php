<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$panel      = $customizer->get_panel( 'seo-sns' );

$customizer->section( 'google-analytics', array(
	'title'    => __( 'Google Analytics', 'mimizuku' ),
	'priority' => 100,
) );
