<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Nav_Menus {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'register_nav_menus' ] );
		add_filter( 'wp_nav_menu', [ $this, 'common' ], 10, 2 );
		add_filter( 'wp_nav_menu', [ $this, 'global_nav' ], 10, 2 );
		add_filter( 'wp_nav_menu', [ $this, 'drawer_nav' ], 10, 2 );
		add_filter( 'nav_menu_css_class', [ $this, 'global_nav_classes' ], 10, 4 );
		add_filter( 'nav_menu_css_class', [ $this, 'drawer_nav_classes' ], 10, 4 );
	}

	/**
	 * Registers wp_nav_menu() menus
	 *
	 * @return void
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	public function register_nav_menus() {
		register_nav_menus( [
			'global-nav' => esc_html__( 'Global Navigation (For PC)', 'mimizuku' ),
			'drawer-nav' => esc_html__( 'Drawer Navigation (For Mobile)', 'mimizuku' ),
			'footer-nav' => esc_html__( 'Footer Navigation', 'mimizuku' ),
		] );
	}

	/**
	 * Sets up nav menu attributs
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
	 */
	public function common( $nav_menu, $args ) {
		return preg_replace(
			'/menu-item-has-children(.*?)"/ms',
			'menu-item-has-children$1" aria-expanded="false"',
			$nav_menu
		);
	}

	/**
	 * Sets up global navigation attributs
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
	 */
	public function global_nav( $nav_menu, $args ) {
		if ( 'global-nav' !== $args->theme_location ) {
			return $nav_menu;
		}

		return preg_replace(
			'/<ul class="sub-menu">/ms',
			'<ul class="_c-menu__submenu">',
			$nav_menu
		);
	}

	/**
	 * Sets up drawer navigation attributs
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/functions/wp_nav_menu/
	 */
	public function drawer_nav( $nav_menu, $args ) {
		if ( 'drawer-nav' !== $args->theme_location ) {
			return $nav_menu;
		}

		return preg_replace(
			'/<ul class="sub-menu">/ms',
			'<div class="_p-drawer__toggle"><i class="fa fa-angle-right"></i></div><ul class="_p-drawer__submenu">',
			$nav_menu
		);
	}

	/**
	 * Sets up global navigation classes
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
	 */
	public function global_nav_classes( $classes, $item, $args, $depth ) {
		if ( 'global-nav' !== $args->theme_location ) {
			return $classes;
		}

		if ( $depth > 0 ) {
			$classes[] = '_c-menu__subitem';
		} else {
			$classes[] = '_c-menu__item';
		}
		return $classes;
	}

	/**
	 * Sets up drawer navigation classes
	 *
	 * @return void
	 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
	 */
	public function drawer_nav_classes( $classes, $item, $args, $depth ) {
		if ( 'drawer-nav' !== $args->theme_location ) {
			return $classes;
		}

		if ( $depth > 0 ) {
			$classes[] = '_p-drawer__subitem';
		} else {
			$classes[] = '_p-drawer__item';
		}
		return $classes;
	}
}
