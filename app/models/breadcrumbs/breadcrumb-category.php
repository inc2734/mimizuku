<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Category extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$category_name = single_cat_title( '', false );
		$category_id   = get_cat_ID( $category_name );
		$this->set_ancestors( $category_id, 'category' );
		$this->set( $category_name );
	}
}
