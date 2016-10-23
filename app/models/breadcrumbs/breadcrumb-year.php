<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Year extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$year = get_query_var( 'year' );
		if ( ! $year ) {
			$ymd  = get_query_var( 'm' );
			$year = $ymd;
		}
		$this->set( $this->year( $year ) );
	}
}
