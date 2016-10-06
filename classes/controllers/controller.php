<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku;

class Controller {

	public function __construct() {
	}

	/**
	 * Rendering the page
	 *
	 * @return void
	 */
	public function render() {
		View::render();
	}

	/**
	 * Sets the lyaout template
	 *
	 * @param string $layout layout template path
	 * @return void
	 */
	public function set_layout( $layout ) {
		View::set_layout( $layout );
	}

	/**
	 * Sets the view template
	 *
	 * @param string $view view template path
	 * @param string $view_suffix view template suffix
	 * @return void
	 */
	public function set_view( $view, $view_suffix = '' ) {
		View::set_view( $view, $view_suffix );
	}

	/**
	 * Loading the view template in layout template
	 *
	 * @return void
	 */
	public static function load_view() {
		View::load_view();
	}
}
