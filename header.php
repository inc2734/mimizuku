<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$header = apply_filters( 'mimizuku_header', 'header' );
$slug   = wpvc_config( 'directory', 'header' );
get_template_part( $slug . '/' . $header );
