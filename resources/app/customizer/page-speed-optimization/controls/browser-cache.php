<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$section    = $customizer->get_section( 'page-speed-optimization' );

$customizer->control( 'checkbox', 'set-browser-cache', [
	'label'       => __( 'Use browser cache', 'mimizuku' ),
	'description' => __( 'The server must support htaccess.', 'mimizuku' ),
	'type'        => 'option',
	'priority'    => 140,
	'default'     => false,
] );

$control = $customizer->get_control( 'set-browser-cache' );
$control->join( $section );

/**
 * Write cache control setting into .htaccess
 *
 * @param WP_Customize_Setting
 */
add_action( 'customize_save_set-browser-cache', function( $customize_setting ) {
	if ( $customize_setting->post_value() === $customize_setting->value() ) {
		return;
	}

	\Inc2734\WP_Page_Speed_Optimization\Page_Speed_Optimization::write_cache_control_setting( (bool) $customize_setting->post_value() );
} );
