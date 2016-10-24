<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Post_Type_Archive extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_type = $this->get_post_type();
		if ( $post_type && 'post' !== $post_type ) {
			$post_type_object = get_post_type_object( $post_type );
			$label = $post_type_object->label;
			$this->set( $label );
		}
	}
}
