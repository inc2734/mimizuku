<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

class Breadcrumb_Single extends Abstract_Breadcrumb {

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	protected function set_items() {
		$post_type = $this->get_post_type();

		if ( $post_type && 'post' !== $post_type ) {
			$this->set_post_type_archive( $post_type );
			$this->set_terms( $post_type );
		} else {
			$this->set_categories();
		}

		$this->set( get_the_title() );
	}

	/**
	 * Sets Breadcrumbs items of post type archive
	 *
	 * @param string $post_type
	 * @return void
	 */
	protected function set_post_type_archive( $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		$label = $post_type_object->label;
		$this->set( $label, $this->get_post_type_archive_link( $post_type ) );
	}

	/**
	 * Sets Breadcrumbs items of terms
	 *
	 * @param string $post_type
	 * @return void
	 */
	protected function set_terms( $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		$taxonomies = $post_type_object->taxonomies;
		if ( ! $taxonomies ) {
			return;
		}

		$taxonomy = array_shift( $taxonomies );
		$terms    = get_the_terms( get_the_ID(), $taxonomy );

		if ( ! $terms ) {
			return;
		}

		$term = array_shift( $terms );
		$this->set_ancestors( $term->term_id, $taxonomy );
		$this->set( $term->name, get_term_link( $term ) );
	}

	/**
	 * Sets Breadcrumbs items of categories
	 *
	 * @return void
	 */
	protected function set_categories() {
		$categories = get_the_category( get_the_ID() );
		if ( $categories ) {
			$category = array_shift( $categories );
			$this->set_ancestors( $category->term_id, 'category' );
			$this->set( $category->name, get_term_link( $category ) );
		}
	}
}
