<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

namespace Mimizuku\App\Setup\Widgets;

/**
 * Registers sidebar
 *
 * @return void
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'mimizuku' ),
		'id'            => 'sidebar',
		'description'   => __( 'Sidebar', 'mimizuku' ),
		'before_widget' => '<section id="%1$s" class="_p-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="_p-widget__title">',
		'after_title'   => '</h1>',
	] );
} );

/**
 * Registers wp_nav_menu() menus
 *
 * @param $args array Argments of wp_tag_cloud
 * @return array
 * @see https://developer.wordpress.org/reference/classes/wp_widget_tag_cloud/widget/
 */
add_filter( 'widget_tag_cloud_args', function( $args ) {
	return array_merge( $args, [
		'smallest' => 12,
		'largest'  => 12,
		'unit'     => 'px',
	] );
} );
