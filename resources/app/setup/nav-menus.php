<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Registers wp_nav_menu() menus
 *
 * @return void
 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
 */
add_action( 'after_setup_theme', function() {
	register_nav_menus( [
		'global-nav' => esc_html__( 'Global Navigation (For PC)', 'mimizuku' ),
		'drawer-nav' => esc_html__( 'Drawer Navigation (For Mobile)', 'mimizuku' ),
	] );
} );

if ( class_exists( 'Inc2734_WP_Basis' ) ) {
	wp_basis_drawer_navigation( 'drawer-nav' );
}

if ( class_exists( 'Inc2734_WP_Basis' ) ) {
	wp_basis_global_navigation( 'global-nav' );
}
