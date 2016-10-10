<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Tags;

/**
 * Whether to support IE9
 *
 * @return boolean
 */
function is_supported_ie9() {
	return apply_filters( 'mimizuku_support_ie9', false );
}
