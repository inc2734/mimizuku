<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$section    = $customizer->get_section( 'design' );

$customizer->control( 'select', 'layout', [
	'label'   => __( 'Page layout', 'mimizuku' ),
	'default' => 'right-sidebar',
	'choices' => mimizuku_get_page_templates(),
] );

$control = $customizer->get_control( 'layout' );
$control->join( $section );
