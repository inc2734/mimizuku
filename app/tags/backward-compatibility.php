<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * A template tag that is get_template_part() using variables
 *
 * @deprecated
 * @param string $template
 * @param array $vars
 * @return void
 */
function get_template_part( $template, $vars = [] ) {
	mimizuku_get_template_part( $template, $vars );
}

/**
 * Whether to support IE9
 *
 * @deprecated
 * @return boolean
 */
function is_supported_ie9() {
	return mimizuku_is_supported_ie9();
}

/**
 * Callback function of the each comments
 *
 * @deprecated
 * @param WP_Comment $comment Comment to display
 * @param array $args An array of arguments
 * @param int $depth Depth of the current comment
 * @return void
 */
function the_comments( $comment, $args, $depth ) {
	mimizuku_the_comments( $comment, $args, $depth );
}

/**
 * Callback function of the each pings
 *
 * @deprecated
 * @return void
 */
function the_pings() {
	mimizuku_the_pings();
}
