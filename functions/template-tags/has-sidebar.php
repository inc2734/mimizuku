<?php
namespace Mimizuku\Tags;

/**
 * Whether to display the sidebar
 *
 * @return boolean
 */
function has_sidebar() {
	return apply_filters( 'mimizuku_has_sidebar', true );
}
