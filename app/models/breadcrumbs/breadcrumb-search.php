<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Search extends Abstract_Breadcrumb {
	protected function set_items() {
		$this->set(
			sprintf(
				__( 'Search Results for: %s', 'mimizuku' ),
				get_search_query()
			)
		);
	}
}
