<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Assets {

	/**
	 * Template directory uri
	 *
	 * @var string
	 */
	protected $template_directory_uri;

	/**
	 * Theme version
	 *
	 * @var float
	 */
	protected $version;

	public function __construct() {
		$this->template_directory_uri = get_template_directory_uri();
		$this->version                = $this->_get_theme_version();

		/**
		 * Enqueues scripts
		 *
		 * @return void
		 */
		add_action( 'wp_enqueue_scripts', function() {
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script(
				get_template(),
				$this->template_directory_uri . '/assets/js/app.min.js',
				[ 'jquery' ],
				$this->version,
				true
			);

			if ( \Mimizuku\App\Tags\is_supported_ie9() ) {
				wp_enqueue_script(
					'html5shiv',
					$this->template_directory_uri . '/assets/vendor/html5.js'
				);
				wp_script_add_data(
					'html5shiv',
					'conditional',
					'lt IE 9'
				);
			}
		} );

		/**
		 * Enqueues styles
		 *
		 * @return void
		 */
		add_action( 'wp_enqueue_scripts', function() {
			if ( ! is_child_theme() ) {
				$handle = get_template();
				$src    = $this->template_directory_uri . '/style.min.css';
			} else {
				$handle = get_stylesheet();
				$src    = get_stylesheet_uri();
			}

			wp_enqueue_style(
				$handle,
				$src,
				[],
				$this->version
			);

			wp_enqueue_style(
				'font-awesome',
				$this->template_directory_uri . '/assets/vendor/font-awesome/css/font-awesome.min.css',
				[],
				$this->version
			);

			if ( \Mimizuku\App\Tags\is_supported_ie9() ) {
				wp_enqueue_style(
					'basis-ie9',
					$this->template_directory_uri . '/assets/vendor/basis-ie9/basis-ie9.min.css',
					[ $handle ],
					$this->version
				);
				wp_style_add_data(
					'basis-ie9',
					'conditional', 'lt IE 10'
				);
			}
		} );
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
