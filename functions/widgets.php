<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\Functions\Widgets;

/**
 * Registers sidebar
 *
 * @return void
 */
function register_sidebars() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'mimizuku' ),
		'id'            => 'sidebar',
		'description'   => __( 'Sidebar', 'mimizuku' ),
		'before_widget' => '<section id="%1$s" class="_p-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="_p-widget__title">',
		'after_title'   => '</h1>',
	] );
}
add_action( 'widgets_init', __NAMESPACE__ . '\\register_sidebars' );

/**
 * Registers wp_nav_menu() menus
 *
 * @param $args array Argments of wp_tag_cloud
 * @return array
 * @see https://developer.wordpress.org/reference/classes/wp_widget_tag_cloud/widget/
 */
function widget_tag_cloud_args( $args ) {
	$args = array_merge( $args, [
		'smallest' => 12,
		'largest'  => 12,
		'unit'     => 'px',
	] );
	return $args;
}
add_filter( 'widget_tag_cloud_args', __NAMESPACE__ . '\\widget_tag_cloud_args' );
