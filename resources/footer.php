<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$footer = apply_filters( 'mimizuku_footer', 'footer' );
$slug   = wpvc_config( 'footer' );
get_template_part( $slug . '/' . $footer );