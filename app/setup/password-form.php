<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup;

class Password_Form {

	public function __construct() {
		add_action( 'the_password_form', [ $this, 'password_form' ] );
		add_action( 'the_content', [ $this, 'remove_unnecessary_tags' ] );
	}

	/**
	 * Sets up password form markup
	 *
	 * @param string $output
	 * @return string
	 */
	public function password_form( $output ) {
		ob_start();
		get_template_part( 'template-parts/password-form' );
		$output = ob_get_clean();
		$output = str_replace( [ "\n", "\r", "\n\r", "\t" ], '', $output );
		return $output;
	}

	/**
	 * Remove unnecessary tags
	 *
	 * @param string $content
	 * @return string
	 */
	public function remove_unnecessary_tags( $content ) {
		return preg_replace( '/<p>(<input class="_c-input-group__btn")/', '$1', $content );
	}
}
