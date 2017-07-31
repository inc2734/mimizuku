<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$sidebar = apply_filters( 'mimizuku_sidebar', 'sidebar' );
wpvc_get_sidebar_template( $sidebar );
