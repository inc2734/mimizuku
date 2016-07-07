<?php
namespace Mimizuku;

class Controller {

	/**
	 * The layout template path
	 *
	 * @var string
	 */
	protected $layout;

	/**
	 * The view template path
	 *
	 * @var string
	 */
	protected $view;

	/**
	 * The view template name suffix
	 *
	 * @var string
	 */
	protected $view_suffix;

	public function __construct() {
	}

	/**
	 * Rendering the page
	 *
	 * @return void
	 */
	public function render() {
		$type = 'direct';
		if ( is_singular() ) {
			$type = 'loop';
		}
		$this->{'_render_' . $type}();

		remove_filter( 'mimizuku_view', array( $this, 'get_view' ) );
		remove_filter( 'mimizuku_view_suffix', array( $this, 'get_view_suffix' ) );
	}

	/**
	 * Rendering in the WordPress loop
	 *
	 * @return void
	 */
	protected function _render_loop() {
		while ( have_posts() ) {
			the_post();
			get_template_part( $this->layout );
		}
	}

	/**
	 * Rendering not in the WordPress loop
	 *
	 * @return void
	 */
	protected function _render_direct() {
		get_template_part( $this->layout );
	}

	public function set_layout( $layout ) {
		$this->layout = $layout;
	}

	public function set_view( $view, $view_suffix = '' ) {
		$this->view = $view;
		$this->view_suffix = $view_suffix;
		add_filter( 'mimizuku_view', array( $this, 'get_view' ) );
		add_filter( 'mimizuku_view_suffix', array( $this, 'get_view_suffix' ) );
	}

	/**
	 * Getting view template path
	 *
	 * @return string
	 */
	public function get_view() {
		return $this->view;
	}

	/**
	 * Getting view template name suffix
	 *
	 * @return string
	 */
	public function get_view_suffix() {
		return $this->view_suffix;
	}
}
