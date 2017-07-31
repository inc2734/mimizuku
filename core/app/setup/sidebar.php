<?php
/**
 * @package mimizuku
 * @author inc2734
 * @license GPL-2.0+
 */

/**
 * Add sidebar widget area
 *
 * @return void
 */
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Sidebar widget area', 'mimizuku' ),
		'id'            => 'sidebar-widgets-area',
		'description'   => __( 'This widgets are displayed in the sidebar of all pages.', 'mimizuku' ),
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	] );
} );

/**
* Add sidebar widget area
*
* @return void
*/
add_action( 'widgets_init', function() {
	register_sidebar( [
		'name'          => __( 'Footer widget area', 'mimizuku' ),
		'id'            => 'footer-widgets-area',
		'description'   => __( 'This widgets are displayed in the footer of all pages.', 'mimizuku' ),
		'before_widget' => '<div id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	] );
} );
