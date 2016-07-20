<?php
namespace Mimizuku\Functions\NavMenus;

/**
 * Register wp_nav_menu() menus
 *
 * @return void
 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
 */
function register() {
	register_nav_menus( [
		'global-nav' => esc_html__( 'Global Navigation (For PC)', 'mimizuku' ),
		'drawer-nav' => esc_html__( 'Drawer Navigation (For Mobile)', 'mimizuku' ),
	] );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\register' );

/**
 * Sets up nav menu attributs
 *
 * @return void
 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function setup_wp_nav_menu( $nav_menu, $args ) {
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
			'<div class="c-drawer__toggle"><i class="fa fa-angle-right"></i></div><ul class="c-drawer__submenu">',
			$nav_menu
		);
		return $nav_menu;
	}

	return $nav_menu;
}
add_filter( 'wp_nav_menu', __NAMESPACE__ . '\\setup_wp_nav_menu', 10, 2 );

/**
 * Sets up menu classes
 *
 * @return void
 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
 */
function nav_menu_css_class( $classes, $item, $args, $depth ) {
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
			$classes[] = '_c-drawer__subitem';
		} else {
			$classes[] = '_c-drawer__item';
		}
		return $classes;
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\nav_menu_css_class', 10, 4 );
