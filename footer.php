<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$footer = apply_filters( 'mimizuku_footer', 'footer' );
$slug   = mimizuku_config( 'app/config/directory', 'footer' );
get_template_part( $slug . '/' . $footer );
