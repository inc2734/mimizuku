<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

$slug = wpvc_config( 'directory', 'sidebar' );
get_template_part( $slug . '/simple' );
