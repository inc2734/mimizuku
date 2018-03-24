<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_Customizer_Framework\Customizer_Framework;

$customizer = Customizer_Framework::init();
$section    = $customizer->get_section( 'title_tagline' );

$theme_link = sprintf(
	'<a href="https://2inc.org" target="_blank">%s</a>',
	__( 'Monkey Wrench', 'mimizuku' )
);

$wordpress_link = sprintf(
	'<a href="https://wordpress.org/" target="_blank">%s</a>',
	__( 'WordPress', 'mimizuku' )
);

$theme_by   = sprintf( __( 'Mimizuku theme by %s', 'mimizuku' ), $theme_link );
$powered_by = sprintf( __( 'Powered by %s', 'mimizuku' ), $wordpress_link );
$copyright  = $theme_by . ' ' . $powered_by;

$customizer->control( 'text', 'mwt-copyright', [
	'transport'   => 'postMessage',
	'label'       => __( 'Copyright', 'mimizuku' ),
	'description' => __( 'HTML usable', 'mimizuku' ),
	'default'     => $copyright,
	'type'        => 'option',
] );

$control = $customizer->get_control( 'mwt-copyright' );
$control->join( $section );
$control->partial( [
	'selector'        => '.c-copyright',
	'render_callback' => function() {
		get_template_part( 'template-parts/copyright' );
	},
] );
