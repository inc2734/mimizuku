<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Scripts {

	/**
	 * Template directory uri
	 *
	 * @var string
	 */
	protected $theme_uri;

	/**
	 * Theme version
	 *
	 * @var float
	 */
	protected $version;

	public function __construct() {
		$this->theme     = get_stylesheet();
		$this->theme_uri = get_template_directory_uri();
		$this->version   = $this->_get_theme_version();

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_comment_reply' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_main' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_for_old_browsers' ] );
	}

	/**
	 * @return void
	 */
	public function enqueue_comment_reply() {
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * @return void
	 */
	public function enqueue_main() {
		if ( is_child_theme() ) {
			$src = get_stylesheet_directory_uri() . '/assets/js/app.min.js';
		} else {
			$src = $this->theme_uri . '/assets/js/app.min.js';
		}

		wp_enqueue_script(
			$this->theme,
			$src,
			[ 'jquery' ],
			$this->version,
			true
		);
	}

	/**
	 * @return void
	 */
	public function enqueue_for_old_browsers() {
		if ( mimizuku_is_supported_ie9() ) {
			wp_enqueue_script(
				'html5shiv',
				$this->theme_uri . '/assets/vendor/html5.js'
			);
			wp_script_add_data(
				'html5shiv',
				'conditional',
				'lt IE 9'
			);
		}
	}

	/**
	 * Return the theme version
	 *
	 * @return string
	 */
	protected function _get_theme_version() {
		$theme = wp_get_theme();
		return $theme->get( 'Version' );
	}
}
