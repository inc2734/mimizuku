<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Home extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$show_on_front  = get_option( 'show_on_front' );
		$page_for_posts = get_option( 'page_for_posts' );
		if ( 'page' === $show_on_front && $page_for_posts ) {
			$title = get_the_title( $page_for_posts );
			$this->set( $title );
		}
	}
}
