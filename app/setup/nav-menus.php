<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\NavMenus;

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
		'footer-nav' => esc_html__( 'Footer Navigation', 'mimizuku' ),
	] );
} );

/**
 * Sets up nav menu attributs
 *
 * @return void
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
add_filter( 'wp_nav_menu', function( $nav_menu, $args ) {
	$nav_menu = preg_replace(
		'/menu-item-has-children(.*?)"/ms',
		'menu-item-has-children$1" aria-expanded="false"',
		$nav_menu
	);

	if ( 'global-nav' === $args->theme_location ) {
		$nav_menu = preg_replace(
			'/<ul class="sub-menu">/ms',
			'<ul class="_c-menu__submenu">',
			$nav_menu
		);
		return $nav_menu;
	}

	if ( 'drawer-nav' === $args->theme_location ) {
		$nav_menu = preg_replace(
			'/<ul class="sub-menu">/ms',
			'<div class="_p-drawer__toggle"><i class="fa fa-angle-right"></i></div><ul class="_p-drawer__submenu">',
			$nav_menu
		);
		return $nav_menu;
	}

	return $nav_menu;
}, 10, 2 );

/**
 * Sets up menu classes
 *
 * @return void
 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */
add_filter( 'nav_menu_css_class', function( $classes, $item, $args, $depth ) {
	if ( 'global-nav' === $args->theme_location ) {
		if ( $depth > 0 ) {
			$classes[] = '_c-menu__subitem';
		} else {
			$classes[] = '_c-menu__item';
		}
		return $classes;
	}

	if ( 'drawer-nav' === $args->theme_location ) {
		if ( $depth > 0 ) {
			$classes[] = '_p-drawer__subitem';
		} else {
			$classes[] = '_p-drawer__item';
		}
		return $classes;
	}

	return $classes;
}, 10, 4 );
