<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Sets up password form markup
 *
 * @param string $output
 * @return string
 */
add_action( 'the_password_form', function( $output ) {
	ob_start();
	get_template_part( 'template-parts/password-form' );
	$output = ob_get_clean();
	$output = str_replace( [ "\n", "\r", "\n\r", "\t" ], '', $output );
	return $output;
} );

/**
 * Remove unnecessary tags
 *
 * @param string $content
 * @return string
 */
add_action( 'the_content', function( $content ) {
	return preg_replace( '/<p>(<input class="_c-input-group__btn")/', '$1', $content );
} );
