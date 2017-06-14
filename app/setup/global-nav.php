<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Global_Nav {

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
		if ( 'global-nav' !== $args->theme_location ) {
			return $nav_menu;
		}

		$nav_menu = preg_replace(
			'/menu-item-has-children(.*?)"/ms',
			'menu-item-has-children$1" aria-haspopup="true"',
			$nav_menu
		);

		$nav_menu = preg_replace(
			'/(_c-navbar__item.*?)"/ms',
			'$1" data-c="navbar__item"',
			$nav_menu
		);

		$nav_menu = preg_replace(
			'/(_c-navbar__subitem.*?)"/ms',
			'$1" data-c="navbar__subitem"',
			$nav_menu
		);

		$nav_menu = preg_replace(
			'/<ul +class="sub-menu">/ms',
			'<ul class="_c-navbar__submenu" data-c="navbar__submenu" aria-hidden="true">',
			$nav_menu
		);

		return $nav_menu;
	}

	/**
	 * Sets up classes
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
	 */
	public function classes( $classes, $item, $args, $depth ) {
		if ( 'global-nav' !== $args->theme_location ) {
			return $classes;
		}

		if ( $depth > 0 ) {
			$classes[] = '_c-navbar__subitem';
		} else {
			$classes[] = '_c-navbar__item';
		}
		return $classes;
	}
}
