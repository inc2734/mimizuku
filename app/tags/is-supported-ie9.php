<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Whether to support IE9
 *
 * @return boolean
 */
function mimizuku_is_supported_ie9() {
	return apply_filters( 'mimizuku_support_ie9', false );
}
