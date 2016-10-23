<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Breadcrumbs {

	/**
	 * Store each item of breadcrumbs in ascending order
	 * @var array
	 */
	protected $breadcrumbs = [];

	/**
	 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
	 */
	public function __construct() {
		$breadcrumb = new Breadcrumb_Front_Page();
		$this->set_items( $breadcrumb->get() );

		$breadcrumb = new Breadcrumb_Blog();
		$this->set_items( $breadcrumb->get() );

		if ( is_404() ) {
			$breadcrumb = new Breadcrumb_404();
		} elseif ( is_search() ) {
			$breadcrumb = new Breadcrumb_Search();
		} elseif ( is_tax() ) {
			$breadcrumb = new Breadcrumb_Taxonomy();
		} elseif ( is_attachment() ) {
			$breadcrumb = new Breadcrumb_Attachment();
		} elseif ( is_page() && ! is_front_page() ) {
			$breadcrumb = new Breadcrumb_Page();
		} elseif ( is_post_type_archive() ) {
			$breadcrumb = new Breadcrumb_Post_Type_Archive();
		} elseif ( is_single() ) {
			$breadcrumb = new Breadcrumb_Single();
		} elseif ( is_category() ) {
			$breadcrumb = new Breadcrumb_Category();
		} elseif ( is_tag() ) {
			$breadcrumb = new Breadcrumb_Tag();
		} elseif ( is_author() ) {
			$breadcrumb = new Breadcrumb_Author();
		} elseif ( is_day() ) {
			$breadcrumb = new Breadcrumb_Day();
		} elseif ( is_month() ) {
			$breadcrumb = new Breadcrumb_Month();
		} elseif ( is_year() ) {
			$breadcrumb = new Breadcrumb_Year();
		} elseif ( is_home() && ! is_front_page() ) {
			$breadcrumb = new Breadcrumb_Home();
		}

		$this->set_items( $breadcrumb->get() );
	}

	/**
	 * Sets beradcrumbs items
	 *
	 * @param array $items
	 * @return void
	 */
	protected function set_items( $items ) {
		foreach ( $items as $item ) {
			$this->set( $item['title'], $item['link'] );
		}
	}

	/**
	 * Adds a item
	 *
	 * @param string $title
	 * @param string $link
	 */
	protected function set( $title, $link = '' ) {
		$this->breadcrumbs[] = [
			'title' => $title,
			'link'  => $link,
		];
	}

	/**
	 * Gets breadcrumbs items
	 *
	 * @return array
	 */
	public function get() {
		return apply_filters( 'mimizuku_breadcrumbs', $this->breadcrumbs );
	}
}
