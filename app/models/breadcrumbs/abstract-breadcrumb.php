<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Models\Breadcrumbs;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class Abstract_Breadcrumb {

	/**
	 * Store each item of breadcrumbs in ascending order
	 * @var array
	 */
	protected $breadcrumbs = [];

	public function __construct() {
		$this->set_items();
	}

	/**
	 * Sets beradcrumbs items
	 *
	 * @return void
	 */
	abstract protected function set_items();

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
	 * Set the ancestors of the specified page or taxonomy
	 *
	 * @param int $object_id Post ID or Term ID
	 * @param string $object_type
	 */
	protected function set_ancestors( $object_id, $object_type ) {
		$ancestors = get_ancestors( $object_id, $object_type );
		krsort( $ancestors );
		if ( 'page' === $object_type ) {
			foreach ( $ancestors as $ancestor_id ) {
				$this->set( get_the_title( $ancestor_id ), get_permalink( $ancestor_id ) );
			}
		} else {
			foreach ( $ancestors as $ancestor_id ) {
				$ancestor = get_term( $ancestor_id, $object_type );
				$this->set( $ancestor->name, get_term_link( $ancestor ) );
			}
		}
	}

	/**
	 * Return custom post type archive page url
	 *
	 * @param string $post_type custom post type name
	 * @return null|string
	 */
	protected function get_post_type_archive_link( $post_type ) {
		$archive_link = get_post_type_archive_link( $post_type );
		if ( $archive_link ) {
			return $archive_link;
		}
	}

	/**
	 * Return the current post type
	 *
	 * @return string
	 */
	protected function get_post_type() {
		global $wp_query;

		$post_type = get_post_type();

		if ( $post_type ) {
			return $post_type;
		}

		if ( isset( $wp_query->query['post_type'] ) ) {
			return $wp_query->query['post_type'];
		}

		return $post_type;
	}

	/**
	 * Return year label
	 *
	 * @param string $year
	 * @return string
	 */
	public function year( $year ) {
		if ( 'ja' === get_locale() ) {
			$year .= '年';
		}
		return $year;
	}

	/**
	 * Return month label
	 *
	 * @param string $month
	 * @return string
	 */
	public function month( $month ) {
		if ( 'ja' === get_locale() ) {
			$month .= '月';
		} else {
			$monthes = [
				1  => 'January',
				2  => 'February',
				3  => 'March',
				4  => 'April',
				5  => 'May',
				6  => 'June',
				7  => 'July',
				8  => 'August',
				9  => 'September',
				10 => 'October',
				11 => 'November',
				12 => 'December',
			];
			$month = $monthes[ $month ];
		}
		return $month;
	}

	/**
	 * Return day label
	 *
	 * @param string $day
	 * @return string
	 */
	public function day( $day ) {
		if ( 'ja' === get_locale() ) {
			$day .= '日';
		}
		return $day;
	}

	/**
	 * Return breadcrumbs items
	 *
	 * @return array
	 */
	public function get() {
		return $this->breadcrumbs;
	}
}
