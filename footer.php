<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$footer = apply_filters( 'mimizuku_footer', '2row' );
$slug   = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'footer' );
get_template_part( $slug . '/' . $footer );
