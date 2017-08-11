<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Use front-page.php when using static front page
 *
 * @param string $template
 * @return string
 */
add_filter( 'frontpage_template', function( $template ) {
	if ( ! is_home() ) {
		return $template;
	}
} );
