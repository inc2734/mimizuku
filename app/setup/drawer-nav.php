<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Drawer_Nav {

	public function __construct() {
		add_filter( 'wp_nav_menu', [ $this, 'wp_nav_menu' ], 10, 2 );
		add_filter( 'nav_menu_css_class', [ $this, 'classes' ], 10, 4 );
	}

	/**
	 * Sets up attributes
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
	 */
	public function wp_nav_menu( $nav_menu, $args ) {
		if ( 'drawer-nav' !== $args->theme_location ) {
			return $nav_menu;
		}

		return preg_replace(
			'/<ul class="sub-menu">/ms',
			'<div class="_c-drawer__toggle" data-c="drawer__toggle" aria-expanded="false"><i class="fa fa-angle-right"></i></div><ul class="_c-drawer__submenu" data-c="drawer__submenu" aria-hidden="true">',
			$nav_menu
		);
	}

	/**
	 * Sets up classes
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
	 */
	public function classes( $classes, $item, $args, $depth ) {
		if ( 'drawer-nav' !== $args->theme_location ) {
			return $classes;
		}

		if ( $depth > 0 ) {
			$classes[] = '_c-drawer__subitem';
		} else {
			$classes[] = '_c-drawer__item';
		}
		return $classes;
	}
}
