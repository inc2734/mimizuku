<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$slug = \Mimizuku\App\Models\Config::get( 'app/config/directory', 'sidebar' );
get_template_part( $slug . '/simple' );
