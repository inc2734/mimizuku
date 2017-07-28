<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$sidebar = apply_filters( 'mimizuku_sidebar', 'sidebar' );
$slug    = wpvc_config( 'sidebar' );
get_template_part( $slug . '/' . $sidebar );
