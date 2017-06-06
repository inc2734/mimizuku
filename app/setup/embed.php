<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Embed {

	public function __construct() {
		add_action( 'embed_oembed_html', [ $this, 'embed_oembed_html' ], 10, 4 );
	}

	/**
	 * oEmbed container customization
	 *
	 * @param mixed $cache
	 * @param string $url
	 * @param array $attr
	 * @param int $post_id
	 */
	public function embed_oembed_html( $cache, $url, $attr, $post_id ) {
		if ( preg_match( '/^https?:\/\/www\.youtube\.com/', $url ) ) {
			$cache = '<div class="_c-responsive-container-16-9">' . $cache . '</div>';
		}
		return $cache;
	}
}
