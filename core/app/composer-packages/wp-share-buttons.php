<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_Share_Buttons' ) ) {
	include_once( get_template_directory() . '/../vendor/inc2734/wp-share-buttons/src/wp-share-buttons.php' );
}

new Inc2734_WP_Share_Buttons();
