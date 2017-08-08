<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

if ( ! class_exists( 'Inc2734_WP_Awesome_Widgets' ) ) {
	include_once( get_template_directory() . '/../vendor/inc2734/wp-awesome-widgets/src/wp-awesome-widgets.php' );
}

new Inc2734_WP_Awesome_Widgets();
