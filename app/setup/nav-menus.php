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
}
