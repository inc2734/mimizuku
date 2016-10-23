<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Day extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$year = get_query_var( 'year' );
		if ( $year ) {
			$month = get_query_var( 'monthnum' );
			$day   = get_query_var( 'day' );
		} else {
			$ymd   = get_query_var( 'm' );
			$year  = substr( $ymd, 0, 4 );
			$month = substr( $ymd, 4, 2 );
			$day   = substr( $ymd, -2 );
		}
		$this->set( $this->year( $year ), get_year_link( $year ) );
		$this->set( $this->month( $month ), get_month_link( $year, $month ) );
		$this->set( $this->day( $day ) );
	}
}
