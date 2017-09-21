<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! is_front_page() && ( is_home() || is_archive() ) ) {
	get_template_part( 'template-parts/archive-sidebar-widget-area' );
} else {
	get_template_part( 'template-parts/sidebar-widget-area' );
}
