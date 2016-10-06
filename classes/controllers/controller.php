<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku;

class Controller {

	/**
	 * View object
	 *
	 * @var View
	 */
	protected $view;

	public function __construct() {
		$this->view = new View();
	}

	/**
	 * Rendering the page
	 *
	 * @param string $view view template path
	 * @param string $view_suffix view template suffix
	 * @return void
	 */
	public function render( $view, $view_suffix = '' ) {
		$this->view->render( $view, $view_suffix );
	}

	/**
	 * Sets the lyaout template
	 *
	 * @param string $layout layout template path
	 * @return void
	 */
	public function layout( $layout ) {
		$this->view->layout( $layout );
	}
}
