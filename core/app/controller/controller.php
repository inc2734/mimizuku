<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

use Inc2734\WP_View_Controller\View_Controller;

/**
 * View controller class
 */
class Mimizuku_Controller extends View_Controller {

	public function __construct() {
		parent::__construct();

		add_filter( 'inc2734_wp_view_controller_layout', function( $layout ) {
			return apply_filters( 'mimizuku_layout', $layout );
		} );

		add_filter( 'inc2734_wp_view_controller_view', function( $view ) {
			return apply_filters( 'mimizuku_view', $view );
		} );
	}
}
