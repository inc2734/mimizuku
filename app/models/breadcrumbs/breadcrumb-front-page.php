<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Front_Page extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$home_label = $this->get_home_label();

		if ( is_front_page() ) {
			$this->set( $home_label );
		} else {
			$this->set( $home_label, home_url() );
		}
	}

	/**
	 * Return front page label
	 *
	 * @return string
	 */
	protected function get_home_label() {
		$page_on_front = get_option( 'page_on_front' );
		$home_label    = __( 'Home', 'mimizuku' );
		if ( $page_on_front ) {
			$home_label = get_the_title( $page_on_front );
		}
		return $home_label;
	}
}
