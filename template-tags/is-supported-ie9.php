<?php
namespace Mimizuku\Tags;

/**
 * Whether to support IE9
 *
 * @return boolean
 */
function is_supported_ie9() {
	return apply_filters( 'mimizuku_support_ie9', false );
}
